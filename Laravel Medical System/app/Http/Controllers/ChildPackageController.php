<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Invoice;
use App\Models\ChildPackage;
use Illuminate\Http\Request;
use App\Models\CreditInvoice;
use Illuminate\Validation\Rule;
use App\Models\ChildAppointment;
use App\Models\ChildPatientIncome;
use Illuminate\Support\Facades\DB;
use App\Models\ChildPatientOutcome;
use Illuminate\Support\Facades\Validator;


class ChildPackageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $child_packages = ChildPackage::latest()->paginate(10);
    return view('child_packages.index',compact('child_packages'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('child_packages.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'department_package' => ['required'],
        'cost' => ['required', 'numeric'],
//        'paid_net' => ['required', 'numeric'],
//        'paid_cash' => ['required', 'numeric'],
        'paid' => ['required', 'numeric'],
        'rest' => ['required', 'numeric'],
//        'paid_type_net' => ['required'],
//        'paid_type_cash' => ['required'],
        'supscription_date' => ['required', 'date_format:"d/m/Y'],
        'expire_date' => ['required', 'date_format:"d/m/Y'],
        'employee_id' => ['required'],
    ]);

    if ($validator->fails()) {
       return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 3])
                   ->withErrors($validator, 'add_package')
                   ->withInput();
    }

    DB::beginTransaction(); // Start the transaction
    try {
        // Prepare Saving
        $department_package = json_decode($request->department_package,true);
        $employee = json_decode($request->employee_id,true);

        //Save
        $child_package = ChildPackage::create([
            'child_patient_id' => $request->child_patient_id,
            'employee_id' => $employee["id"],
            'department_package_id' => $department_package["id"],
            'cost' => $request->cost,
            'supscription_date' => $request->supscription_date,
            'expire_date' => $request->expire_date,
            'paid' => $request->paid,
            'rest' => $request->rest,
//            'paid_type' => $request->paid_type_cash,
            'rest_session_number' => $department_package["session_number"],
            'status' => config('enums.patient_package_status_values.active')
        ]);

        $request->paid_cash = !is_null($request->paid_cash)?$request->paid_cash:0;
        $request->paid_net = !is_null($request->paid_net)?$request->paid_net:0;

        if($request->paid_cash>0 || $request->paid_net>0){
            $invoice = Invoice::create([
                'to' => $child_package->child_patient->fullname,
                'service_name' => $child_package->department_package->department->name,
                'service_desc' => is_null($department_package)?'--':$department_package["name"].' '. ($department_package["session_number"]==1?'':$department_package["session_number"].' جلسة'),
                'paid_cash' => $request->paid_cash,
                'paid_net' => $request->paid_net,
                'paid' => $request->paid,
                'vat' => $child_package->child_patient->nationality_id==1?0:($request->paid*15/115)
            ]);
            if($request->paid_cash>0){
              ChildPatientIncome::create([
              'child_patient_id' => $request->child_patient_id,
              'department_package_id' => $department_package["id"],
              'child_package_id' => $child_package->id,
              'paid' => $request->paid_cash,
              'paid_type' => config('enums.paid_types.cash'),
               'invoice_id' => $invoice->id
              ]);
            }
            if($request->paid_net>0){
                ChildPatientIncome::create([
              'child_patient_id' => $request->child_patient_id,
              'department_package_id' => $department_package["id"],
              'child_package_id' => $child_package->id,
              'paid' => $request->paid_net,
              'paid_type' => config('enums.paid_types.net'),
               'invoice_id' => $invoice->id
              ]);
            }
        }

        $appointment_array = $request->appointments;
        usort($appointment_array, array(ChildPackageController::class,'compareByTimeStamp'));

        $cost_rest = $request->cost;
        $paid_rest = $request->paid;
        $cost = 150;
        foreach ($appointment_array as $key => $appointment) {
          if($cost_rest<150){
            $cost = $cost_rest;
          }
          ChildAppointment::create([
              'child_patient_id' => $request->child_patient_id,
              'employee_id' => $employee["id"],
              'department_package_id' => $department_package["id"],
              'child_package_id' => $child_package->id,
              'name' => $department_package["session_number"]==1?$department_package["name"]:"جلسة ".($key+1),
              'time' => $appointment,
              'cost' => $cost,
              'paid' => $paid_rest>$cost?$cost:($paid_rest<0?0:$paid_rest),
              'rest' => $paid_rest>$cost?0:($cost - $paid_rest),
//              'paid_type' => $request->paid_type_cash,
              'status' => 0
          ]);
          $cost_rest = $cost_rest - $cost;
          $paid_rest = $paid_rest - $cost;
        }

        DB::commit();      //End transaction
        return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 3])
            ->with('success', 'تم حجز الاشتراك بنجاح، لطباعة الفاتورة برجاء '. '<a target="_blank" href="'. route('invoices.show', $invoice->id) . '">الضغط هنا</a>');
      } catch (Exception $e) {
          DB::rollBack();
          return redirect()->route('error-500');
      }
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\ChildPackage  $child_package
  * @return \Illuminate\Http\Response
  */
  public function show(ChildPackage $child_package)
  {
      Carbon::setLocale('ar');
      return view('child_packages.show',compact('child_package'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\ChildPackage  $child_package
  * @return \Illuminate\Http\Response
  */
  public function edit(ChildPackage $child_package)
  {
    return view('child_packages.edit', compact('child_package'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\ChildPackage  $child_package
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, ChildPackage $child_package)
  {
    switch ($request->type) {
      case 'reception_edit':
        $validator = Validator::make($request->all(), [
            'department_package' => ['required'],
            'cost' => ['required', 'numeric'],
            'paid' => ['required', 'numeric'],
//            'paid_cash' => ['required', 'numeric'],
//            'paid_net' => ['required', 'numeric'],
            'rest' => ['required', 'numeric'],
//            'paid_type_cash' => ['required'],
//            'paid_type_net' => ['required'],
            'supscription_date' => ['required', 'date_format:"d/m/Y'],
            'expire_date' => ['required', 'date_format:"d/m/Y'],
            'employee_id' => ['required'],
        ]);

        if ($validator->fails()) {
           return redirect()->route('child_patients.show', ['child_patient' => $child_package->child_patient_id, 'tabindex' => 3])
                       ->withErrors($validator, 'edit_package')
                       ->withInput();
        }

        DB::beginTransaction(); // Start the transaction
        try {
            // Prepare Saving
            $department_package = json_decode($request->department_package,true);
            $employee = json_decode($request->employee_id,true);
            $old_paid = $child_package->paid;
            $old_session_number = $child_package->department_package->session_number;

            $child_package->update([
              'department_package_id' => $department_package["id"],
              'cost' => $request->cost,
              'expire_date' => $request->expire_date,
              'paid' => $request->paid + $old_paid,
              'rest' => $request->rest,
//              'paid_type' => $request->paid_type_cash,
              'rest_session_number' => $department_package["session_number"] - ($child_package->department_package->session_number - $child_package->rest_session_number)
            ]);

            $request->paid_cash = !is_null($request->paid_cash)?$request->paid_cash:0;
            $request->paid_net = !is_null($request->paid_net)?$request->paid_net:0;

            if($request->paid_cash > 0 || $request->paid_net > 0){
                $invoice = Invoice::create([
                    'to' => $child_package->child_patient->fullname,
                    'service_name' => $child_package->department_package->department->name,
                    'service_desc' => is_null($department_package)?'--':$department_package["name"].' '. ($department_package["session_number"]==1?'':$department_package["session_number"].' جلسة'),
                    'paid' => $request->paid + $old_paid,
                    'paid_cash' => $request->paid_cash,
                    'paid_net' => $request->paid_net,
                    'vat' => $child_package->child_patient->nationality_id==1?0:($request->paid*15/115)
                ]);
                if($request->paid_cash > 0 ){
                   ChildPatientIncome::create([
                  'child_patient_id' => $child_package->child_patient_id,
                  'department_package_id' => $department_package["id"],
                  'child_package_id' => $child_package->id,
                  'paid' => $request->paid_cash,
                  'paid_type' => config('enums.paid_types.cash'),
                   'invoice_id' => $invoice->id
              ]);}
                if( $request->paid_net > 0){
                   ChildPatientIncome::create([
                  'child_patient_id' => $child_package->child_patient_id,
                  'department_package_id' => $department_package["id"],
                  'child_package_id' => $child_package->id,
                  'paid' => $request->paid_net,
                  'paid_type' => config('enums.paid_types.net'),
                   'invoice_id' => $invoice->id
              ]);}

           }

            if($department_package["session_number"]==1){ //update in the session_number =1
              foreach ($child_package->child_appointments as $appointment) {
                  $appointment->update([
                    'employee_id' => $employee["id"],
                    'department_package_id' => $department_package["id"],
                    'child_package_id' => $child_package->id,
                    'name' => $department_package["name"],
                    'cost' => $request->cost,
                    'paid' => $request->paid + $old_paid,
                    'rest' => $request->rest,
//                    'paid_type' => $request->paid_type_net
                  ]);
              }
            }else{  //update in session_number > 1
              $cost_rest = $request->cost;
              $paid_rest = $request->paid + $old_paid;
              $cost = 150;
              foreach ($child_package->child_appointments as $key => $appointment) {
                  if($cost_rest<150){
                    $cost = $cost_rest;
                  }
                  $appointment->update([
                    'employee_id' => $employee["id"],
                    'department_package_id' => $department_package["id"],
                    'child_package_id' => $child_package->id,
                    'name' => $department_package["session_number"]==1?$department_package["name"]:"جلسة ".($key+1),
                    'cost' => $cost,
                    'paid' => $paid_rest>$cost?$cost:($paid_rest<0?0:$paid_rest),
                    'rest' => $paid_rest>$cost?0:($cost - $paid_rest),
//                    'paid_type' => $request->paid_type_cash
                  ]);
                  $cost_rest = $cost_rest - $cost;
                  $paid_rest = $paid_rest - $cost;
              }

              if(isset($request->appointments)){
                $appointment_array = $request->appointments;
                usort($appointment_array, array(ChildPackageController::class,'compareByTimeStamp'));
                foreach ($appointment_array as $key => $appointment) {
                  if($cost_rest<150){
                    $cost = $cost_rest;
                  }
                  ChildAppointment::create([
                      'child_patient_id' => $child_package->child_patient_id,
                      'employee_id' => $employee["id"],
                      'department_package_id' => $department_package["id"],
                      'child_package_id' => $child_package->id,
                      'name' => $department_package["session_number"]==1?$department_package["name"]:"جلسة ".($key+1+count($child_package->child_appointments)),
                      'time' => $appointment,
                      'cost' => $cost,
                      'paid' => $paid_rest>$cost?$cost:($paid_rest<0?0:$paid_rest),
                      'rest' => $paid_rest>$cost?0:($cost - $paid_rest),
//                      'paid_type' => $request->paid_type_cash,
                      'status' => 0
                  ]);
                  $cost_rest = $cost_rest - $cost;
                  $paid_rest = $paid_rest - $cost;
                }
              }
            }

            DB::commit();      //End transaction
            return redirect()->route('child_patients.show', ['child_patient' => $child_package->child_patient_id, 'tabindex' => 3])
                ->with('success', 'تم تحديث الاشتراك بنجاح، لطباعة الفاتورة برجاء '. '<a target="_blank" href="'. route('invoices.show', $invoice->id) . '">الضغط هنا</a>');
          } catch (Exception $e) {
              DB::rollBack();
              return redirect()->route('error-500');
          }
        break;
      case 'all_edit':
        // code...
        break;
      case 'request_pending':
          DB::beginTransaction(); // Start the transaction
          try {

            if(isset($request->file)){
              $file = $request->file('file');
              $filename = $child_package->id.'_'.$file->getClientOriginalName();
              $file->move(storage_path('app/public/child_patients/'.$child_package->child_patient_id.'/pending_file/'), $filename);
            }

            $child_package->update([
              'status' => config('enums.patient_package_status_values.pending'),
              'pending_time' => Carbon::now()->startOfDay()->format('d/m/Y'),
              'pending_reason' => $request->reason,
              'pending_file' => isset($request->file)?('child_patients/'.$child_package->child_patient_id.'/pending_file/'. $filename):$request->file
            ]);

            $appointment_list = ChildAppointment::where('child_package_id', $child_package->id)
                            ->whereDate('time', '>=', Carbon::now()->addDays(1)->startOfDay())
                            ->get();
            $ids_list = array();
            foreach($appointment_list as $key => $appointment){
              array_push($ids_list, $appointment->id);
              $appointment->delete();
            }
            $removed_rebook_list = ChildAppointment::where('child_package_id', $child_package->id)
                            ->whereIn('child_appointment_id', $ids_list)
                            ->get();
            foreach($removed_rebook_list as $key => $appointment){
              $appointment->update([
                'child_appointment_id' => 0
              ]);
            }
            DB::commit();      //End transaction
            return redirect()->route('child_patients.show', ['child_patient' => $child_package->child_patient_id, 'tabindex' => 3])
                ->with('success', 'تم ايقاف الاشتراك بنجاح');
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->route('error-500');
            }
        break;
      case 'reactive_package':
      DB::beginTransaction(); // Start the transaction
      try {
          // Prepare Saving
          $department_package = json_decode($request->department_package,true);
          $employee = json_decode($request->employee_id,true);

            $child_package->update([
              'status' => config('enums.patient_package_status_values.active'),
              'expire_date' => $request->expire_date,
            ]);

            $cost_rest = $request->cost;
            $paid_rest = $request->paid;
            $cost = 150;
            foreach ($child_package->child_appointments as $appointment) {
                if($cost_rest<150){
                  $cost = $cost_rest;
                }
                $cost_rest = $cost_rest - $cost;
                $paid_rest = $paid_rest - $cost;
            }

            if(isset($request->appointments)){
              $appointment_array = $request->appointments;
              usort($appointment_array, array(ChildPackageController::class,'compareByTimeStamp'));
              foreach ($appointment_array as $key => $appointment) {
                if($cost_rest<150){
                  $cost = $cost_rest;
                }
                ChildAppointment::create([
                    'child_patient_id' => $child_package->child_patient_id,
                    'employee_id' => $employee["id"],
                    'department_package_id' => $department_package["id"],
                    'child_package_id' => $child_package->id,
                    'name' => $department_package["session_number"]==1?$department_package["name"]:"جلسة ".($key+1+count($child_package->child_appointments)),
                    'time' => $appointment,
                    'cost' => $cost,
                    'paid' => $paid_rest>$cost?$cost:($paid_rest<0?0:$paid_rest),
                    'rest' => $paid_rest>$cost?0:($cost - $paid_rest),
//                    'paid_type' => $request->paid_type_cash,
                    'status' => 0
                ]);
                $cost_rest = $cost_rest - $cost;
                $paid_rest = $paid_rest - $cost;
              }
            }

          DB::commit();      //End transaction
          return redirect()->route('child_patients.show', ['child_patient' => $child_package->child_patient_id, 'tabindex' => 3])
              ->with('success', 'تم تفعيل الاشتراك بنجاح');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('error-500');
        }
        break;
      case 'add_outcome':
          DB::beginTransaction(); // Start the transaction
          try {
              foreach ($child_package->child_patient_incomes as $income){
                  $credit_invoice = null;
                  if(!is_null($income->invoice_id)){
                      $credit_invoice = CreditInvoice::create([
                          'invoice_id' => $income->invoice_id,
                          'credit_cost' => ($income->paid*$request->paid)/$child_package->paid,
                          'reason' => $child_package->department_package->session_number - $child_package->rest_session_number
                      ]);
                  }
                  childPatientOutcome::create([
                      'child_patient_id' => $request->child_patient_id,
                      'child_package_id' => $child_package->id,
                      'description' => 'استرداد حجز',
                      'paid' => ($income->paid*$request->paid)/$child_package->paid,
                      'credit_invoice_id' => is_null($credit_invoice)?null:$credit_invoice->id
                  ]);
              }
              $child_package->update([
                  'is_refunded' => 1
              ]);
              DB::commit();      //End transaction
              return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 6])
                  ->with('success', 'تم اضافة المبلغ المسترد بنجاح'. is_null($credit_invoice)?'':'، لطباعة اشعار دائن للفاتورة الضريبية المبسطة برجاء <a target="_blank" href="'. route('invoices.show', $credit_invoice->id) . '">الضغط هنا</a>');
          } catch (Exception $e) {
              DB::rollBack();
              return redirect()->route('error-500');
          }
        break;
      case 'add_income':
        DB::beginTransaction(); // Start the transaction
        try {
            // Prepare Saving
            $old_rest = $child_package->rest;
            $old_paid = $child_package->paid;

            $child_package->update([
              'paid' => $request->paid + $old_paid,
              'rest' => $old_rest - $request->paid,
//              'paid_type' => $request->paid_type_cash
            ]);

            $request->paid_cash = !is_null($request->paid_cash)?$request->paid_cash:0;
            $request->paid_net = !is_null($request->paid_net)?$request->paid_net:0;

            if($request->paid_cash > 0 || $request->paid_net > 0){
                $invoice = Invoice::create([
                    'to' => $child_package->child_patient->fullname,
                    'service_name' => $child_package->department_package->department->name,
                    'service_desc' => is_null($child_package->department_package)?'--':$child_package->department_package->name.' '. ($child_package->department_package->session_number==1?'':$child_package->department_package->session_number.' جلسة'),                    'cost' => $request->paid,
                    'paid' => $request->paid,
                    'paid_cash' => $request->paid_cash,
                    'paid_net' => $request->paid_net,
                    'vat' => $child_package->child_patient->nationality_id==1?0:($request->paid*15/115)
                ]);
                if($request->paid_cash > 0 ){
                  ChildPatientIncome::create([
                    'child_patient_id' => $child_package->child_patient_id,
                    'department_package_id' => $child_package->department_package_id,
                    'child_package_id' => $child_package->id,
                    'paid' => $request->paid_cash,
                    'paid_type' => config('enums.paid_types.cash'),
                     'invoice_id' => $invoice->id
                ]);
                }
                if($request->paid_net > 0 ){
                  ChildPatientIncome::create([
                    'child_patient_id' => $child_package->child_patient_id,
                    'department_package_id' => $child_package->department_package_id,
                    'child_package_id' => $child_package->id,
                    'paid' => $request->paid_net,
                    'paid_type' => config('enums.paid_types.net'),
                     'invoice_id' => $invoice->id
                ]);
                }

           }

            if($child_package->department_package->session_number==1){ //update in the session_number =1
              foreach ($child_package->child_appointments as $appointment) {
                  $appointment->update([
                    'paid' => $request->paid + $old_paid,
                    'rest' => $old_rest - $request->paid,
//                    'paid_type' => $request->paid_type_cash
                  ]);
              }
            }else{  //update in session_number > 1
              $cost_rest = $child_package->cost;
              $paid_rest = $request->paid + $old_paid;
              $cost = 150;
              foreach ($child_package->child_appointments as $appointment) {
                  if($cost_rest<150){
                    $cost = $cost_rest;
                  }
                  $appointment->update([
                    'cost' => $cost,
                    'paid' => $paid_rest>$cost?$cost:($paid_rest<0?0:$paid_rest),
                    'rest' => $paid_rest>$cost?0:($cost - $paid_rest),
//                    'paid_type' => $request->paid_type_cash
                  ]);
                  $cost_rest = $cost_rest - $cost;
                  $paid_rest = $paid_rest - $cost;
              }
            }

            DB::commit();      //End transaction
            return redirect()->route('child_patients.show', ['child_patient' => $request->child_patient_id, 'tabindex' => 6])
                ->with('success', 'تم اضافة المبلغ المدفوع بنجاح، لطباعة الفاتورة برجاء '. '<a target="_blank" href="'. route('invoices.show', $invoice->id) . '">الضغط هنا</a>');
          } catch (Exception $e) {
              DB::rollBack();
              return redirect()->route('error-500');
          }
        break;
      default:
        // code...
        break;
    }
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\ChildPackage  $child_package
  * @return \Illuminate\Http\Response
  */
  public function destroy(ChildPackage $child_package)
  {
    // $child_package->fill([
    //   'deleted' => true
    // ])->save();
    return redirect()->route('child_packages.index');
          // ->with('success','تم حذف المريض بنجاح');
  }

  private static function compareByTimeStamp($time1, $time2)
  {
    if (strtotime($time1) > strtotime($time2))
        return 1;
    else if (strtotime($time1) < strtotime($time2))
        return -1;
    else
        return 0;
  }

}
