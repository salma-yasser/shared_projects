<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;


class EmployeeAttendanceController extends Controller
{
  public function index(Request $request)
  {
      // $employee_attendances = EmployeeAttendance::latest()->paginate(5);
      $attendances = EmployeeAttendance::select('emp_attendance.*', 'attendance_types.name as attendance_type', 'attendance_types.color as className', DB::raw("CONCAT(emp_attendance.date,'T',emp_attendance.attend_time) as start, CONCAT(emp_attendance.date,'T',emp_attendance.leave_time) as end"))
      ->where('employee_id', "!=", 1)
      // ->where('exist',1)
      ->join('attendance_types','attendance_types.id','=','emp_attendance.attendance_types_id')
      ->get();
      return view('employee_attendances.index', compact('attendances'));
  }

  public function show(Request $request, Employee $employee)
  {
      if($request->ajax()) {
          $data = EmployeeAttendance::select('emp_attendance.*', 'attendance_types.name as attendance_type', 'attendance_types.color as className', DB::raw("CONCAT(emp_attendance.date,'T',emp_attendance.attend_time) as start, CONCAT(emp_attendance.date,'T',emp_attendance.leave_time) as end"))
          ->where('employee_id', $employee->id)
          ->join('attendance_types','attendance_types.id','=','emp_attendance.attendance_types_id')
          ->get();
          return response()->json($data);
      }
      // return view('welcome');
  }

  public function calendarEvents(Request $request)
  {

      switch ($request->type) {
      //    case 'create':
      //       $event = CrudEvents::create([
      //           'event_name' => $request->event_name,
      //           'event_start' => $request->event_start,
      //           'event_end' => $request->event_end,
      //       ]);
      //
      //       return response()->json($event);
      //      break;
      //
      //
      //
         case 'edit':
            $attendance_type = 1;
            switch ($request->event_category) {
                case 'bg-status':
                  $attendance_type = 1;
                  break;
                case 'bg-danger':
                  $attendance_type = 2;
                  break;
                case 'bg-warning':
                  $attendance_type = 3;
                  break;
                case 'bg-primary':
                  $attendance_type = 4;
                  break;
            }
            $event = EmployeeAttendance::find($request->id)->update([
                'attendance_types_id' => $attendance_type,
                'attend_time' => $request->event_start,
                'leave_time' => $request->event_end,
            ]);

            return response()->json($event);
           break;
      //
      //    case 'delete':
      //       $event = CrudEvents::find($request->id)->delete();
      //
      //       return response()->json($event);
      //      break;
      //
         default:
           # ...
           break;
      }
  }

    /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('employee_attendances.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
          // 'name' => 'required',
          // 'detail' => 'required',
      ]);

      EmployeeAttendance::create($request->all());
      return redirect()->route('employee_attendances.index')
            ->with('status','EmployeeAttendance created statusfully.');
  }

  // /**
  //  * Display the specified resource.
  //  *
  //  * @param  \App\EmployeeAttendance  $employee_attendance
  //  * @return \Illuminate\Http\Response
  //  */
  // public function show(EmployeeAttendance $employee_attendance)
  // {
  //     return view('employee_attendances.show',compact('employee_attendance'));
  // }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\EmployeeAttendance  $employee_attendance
   * @return \Illuminate\Http\Response
   */
  public function edit(EmployeeAttendance $employee_attendance)
  {
      return view('employee_attendances.edit',compact('employee_attendance'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\EmployeeAttendance  $employee_attendance
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, EmployeeAttendance $employee_attendance)
  {
      $request->validate([
          // 'name' => 'required',
          // 'detail' => 'required',
      ]);

      $employee_attendance->update($request->all());
      return redirect()->route('employee_attendances.index')
                      ->with('status','EmployeeAttendance updated statusfully');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\EmployeeAttendance  $employee_attendance
   * @return \Illuminate\Http\Response
   */
  public function destroy(EmployeeAttendance $employee_attendance)
  {
      $employee_attendance->delete();
      return redirect()->route('employee_attendances.index')
                      ->with('status','EmployeeAttendance deleted statusfully');
  }

}
