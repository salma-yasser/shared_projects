@include('child_patients.dialogs.add_outcome')
@include('child_patients.dialogs.add_income')
<div class="card mb-0">
  <div class="card-body pt-0">
    <div class="col-md-12 submit-section proceed-btn text-right pt-3 pr-0 pl-0">
        <a href="#add_outcome" class="btn btn-danger submit-btn" data-toggle="modal" {{$child_patient->not_refunded_packages->count()>0?'':'hidden'}}>استرداد حجز</a>
        <a href="#add_income" class="btn btn-success submit-btn" data-toggle="modal">دفع حجز</a>
        <a href="#" class="btn btn-primary submit-btn" id= "multiple_invoice" onclick=select() target="_blank">فاتوره مجمعه</a>
    </div>
    <div class="table-responsive pt-3">
      <table id="table_billing" class="datatable table table-hover table-center mb-0">
        <thead>
          <tr>
            <th>
{{--              <input type="checkbox" id="all_checkboxes" />--}}
            </th>
            <th>تاريخ الدفع</th>
            <th>رقم الفاتوره</th>
            <th>رقم الحجز</th>
            <th>نوع الحجز</th>
            <th>المبلغ المدفوع</th>
            <th>نوع الدفع</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach($child_patient->child_patient_incomes as $income)
                <tr id="{{$income->id}}" style="color:green;">
                  <td>
                      <input type="checkbox" id="select"name="select" value="{{$income->invoice_id}}" />
                  </td>
                  <td><i class="fa fa-arrow-left" aria-hidden="true"></i>
                      {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $income->created_at)->format('Y/m/d')}}</td>
                  <td>{{$income->invoice_id}}</td>
                  <td>{{$income->child_package_id}}</td>
                  <td>{{ is_null($income->department_package)?'--':$income->department_package->name.' '. ($income->department_package->session_number==1?'':$income->department_package->session_number.' جلسة') }}</td>
                  <td>{{$income->paid}}</td>
                  <td>
                      @if($income->paid_type==0)
                        نقداً
                      @elseif($income->paid_type==1)
                        شبكة
                      @endif
                  </td>
                  <td class="text-center">
                      <div class="table-action">
                          @if(!is_null($income->invoice))
                              <a href="{{ route('invoices.show', $income->invoice->id) }}" onclick="e.preventDefault();" target="_blank" class="btn btn-sm bg-primary-light">
                                  <i class="fas fa-print"></i>
                              </a>
                          @endif
                      </div>
                  </td>
                </tr>
            @endforeach
            @foreach($child_patient->child_patient_outcomes as $outcome)
                <tr id="{{$outcome->id}}" style="color:red;">
                  <td></td>
                  <td><i class="fa fa-arrow-right" aria-hidden="true"></i>
                      {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $outcome->created_at)->format('Y/m/d')}}</td>
                  <td>{{ $outcome->credit_invoice_id }}</td>
                  <td>{{$outcome->child_package_id}}</td>
                  <td>{{ is_null($outcome->child_package->department_package)?'--':$outcome->child_package->department_package->name.' '. ($outcome->child_package->department_package->session_number==1?'':$outcome->child_package->department_package->session_number.' جلسة') }}</td>
                  <td>{{$outcome->paid}}</td>
                  <td>--</td>
                  <td class="text-center">
                      <div class="table-action">
                          @if(!is_null($outcome->credit_invoice))
                              <a href="{{ route('credit_invoices.show', $outcome->credit_invoice->id) }}" onclick="e.preventDefault();" target="_blank" class="btn btn-sm bg-primary-light">
                                  <i class="fas fa-print"></i>
                              </a>
                          @endif
                      </div>
                  </td>
                </tr>
            @endforeach
          </form>
        </tbody>
      </table>

    </div>
  </div>
</div>
<style>
#table_billing th, td { text-align: center; }
</style>
<script>
$(document).ready(function() {
    $('#table_billing').DataTable().order( [[ 1, 'desc' ], [ 6, 'asc']] ).draw();
});

function select() {
    let markedCheckbox = document.getElementsByName('select');
    let invoice_ids=[]
    // Loop on all checkbox
    for (let checkbox of markedCheckbox) {
        if (checkbox.checked) {
            // insert the value of checked into array
            invoice_ids.push(checkbox.value);
        }
    }
    if(invoice_ids.length > 0) {
        // Convert array of ids to string seperated by '-'
        let string_ids = invoice_ids.join('-');

        window.open(
            '{{ env('APP_URL') }}' + "/invoices/" + string_ids,
            '_blank'
        );
    }
    return false;
}
</script>
