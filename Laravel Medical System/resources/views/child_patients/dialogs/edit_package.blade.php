<div class="modal fade" id="edit_package" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تحديث حجز</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit_form" action="" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input id="child_package" value="" hidden/>
                    <input id="old_department_package" value="" hidden/>
                    <input id="old_appointments" value="" hidden/>

                    <input name="type" value="reception_edit" hidden/>
                    <div class="row form-row">
                        <div class="col-md-4">
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="department">القسم<span class="text-danger">*</span></label>
                                        <select id="department" class="form-control select form-control-alternative{{ $errors->edit_package->has('department') ? ' is-invalid' : '' }}" name="department" required disabled>
                                            <option disabled selected hidden value="">اختر</option>
                                            @foreach ($child_patient->child_departments as $child_department)
                                                <option value="{{ $child_department->department }}" {{ (old('department') == $child_department->department)?'selected':''}}>{{ $child_department->department->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->edit_package->has('department'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('department') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="department_package">باقة الحجز<span class="text-danger">*</span></label>
                                        <select id="department_package" class="form-control select form-control-alternative{{ $errors->edit_package->has('department_package') ? ' is-invalid' : '' }}" name="department_package" required>
                                            <option disabled selected hidden value="">اختر</option>
                                        </select>
                                        @if ($errors->edit_package->has('department_package'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('department_package') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="cost">السعر</label>
                                        <input id="cost" type="text" value="{{ old('cost') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('cost') ? ' is-invalid' : '' }}" name="cost" readonly/>
                                        @if ($errors->edit_package->has('cost'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('cost') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="discount">خصم</label>
                                        <input id="discount" type="text" value="{{ old('discount') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('discount') ? ' is-invalid' : '' }}" name="discount" readonly/>
                                        @if ($errors->edit_package->has('discount'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('discount') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="old_rest">متبقي</label>
                                        <input id="old_paid" type="text" value="{{ old('old_paid') }}" name="old_paid" hidden readonly/>
                                        <input id="old_rest" type="text" value="{{ old('old_rest') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('old_rest') ? ' is-invalid' : '' }}" name="old_rest" readonly/>
                                        @if ($errors->edit_package->has('old_rest'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('old_rest') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="paid">المبلــــغ المدفـــوع <span class="text-danger">*</span></label>
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <input id="paid_cash" type="text" value="{{ old('paid_cash') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('paid_cash') ? ' is-invalid' : '' }}" name="paid_cash" autocomplete="paid_cash"/>
                                                <div class="input-group-append" style="width: 35%">
                                                    <input id="paid_type_cash" type="text" value="نقداً" class="form-control form-control-alternative{{ $errors->edit_package->has('paid_type_cash') ? ' is-invalid' : '' }}" name="paid_type_cash" disabled>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <input id="paid_net" type="text" value="{{ old('paid_net') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('paid_net') ? ' is-invalid' : '' }}" name="paid_net" autocomplete="paid_net"/>
                                                <div class="input-group-append" style="width: 35%">
                                                    <input id="paid_type_net" type="text" value="شبكة" class="form-control form-control-alternative{{ $errors->edit_package->has('paid_type_net') ? ' is-invalid' : '' }}" name="paid_type_net" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <input id="paid" type="text" value="{{ old('paid') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('paid') ? ' is-invalid' : '' }}" name="paid" readonly required/>
                                        @if ($errors->edit_package->has('paid'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('paid') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="rest">باقي المبلغ المدفوع<span class="text-danger">*</span></label>
                                        <input id="rest" type="text" value="{{ old('rest') }}" class="form-control form-control-alternative{{ $errors->edit_package->has('rest') ? ' is-invalid' : '' }}" name="rest" readonly/>
                                        @if ($errors->edit_package->has('rest'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('rest') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="supscription_date">تاريخ الحجز<span class="text-danger">*</span></label>
                                        <input id="supscription_date" type="text" value="{{ old('supscription_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->edit_package->has('supscription_date') ? ' is-invalid' : '' }}" name="supscription_date" autocomplete="supscription_date" required readonly/>
                                        @if ($errors->edit_package->has('supscription_date'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('supscription_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="expire_date">تاريخ الانتهاء<span class="text-danger">*</span></label>
                                        <input id="expire_date" type="text" value="{{ old('expire_date') }}" class="form-control datetimepicker form-control-alternative{{ $errors->edit_package->has('expire_date') ? ' is-invalid' : '' }}" name="expire_date" autocomplete="expire_date" required readonly/>
                                        @if ($errors->edit_package->has('expire_date'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->edit_package->first('expire_date') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="employee_id">الطبيب المعالج<span class="text-danger">*</span></label>
                                    <select id="employee_id" class="form-control select form-control-alternative{{ $errors->edit_package->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" required disabled>
                                        <option disabled selected hidden value="">اختر</option>
                                    </select>
                                    @if ($errors->edit_package->has('employee_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->edit_package->first('employee_id') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12" id="schedule_div">

                            </div>
                        </div>
                    </div>

                    <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">
                <span id="text-loading" hidden><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              من فضلك انتظر...</span>
                        <span id="text-btn" >حفظ</span>
                    </button>
                    <!-- <button id="save" type="submit" class="btn btn-primary btn-block" disabled="true">حفظ</button> -->
                </form>
            </div>
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    if ("{{count($errors->edit_package) > 0}}"){
        $('#edit_package').modal('show');
    }

    function moveNextEditPackage(index){
        $("#edit_package #schedule_div_"+(index-1)).attr('hidden',true);
        $("#edit_package #schedule_div_"+index).attr('hidden',false);
        return false;
    }
    function movePreviousEditPackage(index){
        $("#edit_package #schedule_div_"+(index+1)).attr('hidden',true);
        $("#edit_package #schedule_div_"+index).attr('hidden',false);
        return false;
    }
    function addExtraTime(object, start_date){
        if(JSON.parse($("#edit_package #department_package").val()).id != JSON.parse($("#edit_package #child_package").val()).department_package_id){
            if($(object).hasClass("selected")){    //remove selected
                $(object).find("input").remove();
                $(object).removeClass("selected");
                $("#edit_package #save").attr("disabled", true);
            }else{  // add appointment
                var appointments = $("input[name='appointments[]']").map(function(){return $(this).val();}).get();
                var max = JSON.parse($("#edit_package #department_package").val()).session_number - JSON.parse($("#edit_package #child_package").val()).department_package.session_number;
                if(appointments.length<max){
                    var appointment = moment(new Date (new Date(start_date).toDateString() + ' ' + object.children[0].innerHTML)).format("YYYY-MM-DD HH:mm:ss");
                    $(object).append("<input name='appointments[]' value='"+appointment+"' hidden/>");
                    $(object).addClass("selected");
                    if(appointments.length==(max-1)){
                        $("#edit_package #save").attr("disabled", false);
                    }
                }else{
                    alert("لقد وصلت للحد الأقصى من الجلسات");
                }
            }
        }
        return false;
    }

    $(document).ready(function () {
        $('#edit_package').on('show.bs.modal', function(e) {
            var package_data = $(e.relatedTarget).data('item');
            var old_appointments = $(e.relatedTarget).data('appointments');
            var url = '{{ route("child_packages.update", ":id") }}';
            url = url.replace(':id', package_data.id);
            $("#edit_package form").attr("action", url);
            $("#edit_package #child_package").val(JSON.stringify(package_data));
            $("#edit_package #old_department_package").val(JSON.stringify(package_data.department_package));
            $("#edit_package #old_appointments").val(JSON.stringify(old_appointments));

            $("#edit_package #paid_net").val(null);
            $("#edit_package #paid_cash").val(null);
            $('#edit_package #paid').val(0);
            // $("#edit_package #paid_type").val(package_data.paid_type).change();
            $("#edit_package #cost").val(package_data.cost);
            $("#edit_package #discount").val(package_data.discount);
            $("#edit_package #old_paid").val(package_data.paid);
            $("#edit_package #old_rest").val(package_data.rest);
            $("#edit_package #supscription_date").val(package_data.supscription_date);
            $("#edit_package #expire_date").val(package_data.expire_date);

            $("#edit_package #department option").each(function(){
                if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.department_package.department.id)){
                    $("#edit_package #department").val($(this).val()).change();
                }
            });

            var department = JSON.parse($('#edit_package #department').val());

            $('#edit_package #department_package option').remove();
            optionList = '';
            optionList += "<option disabled selected hidden value=''>اختر</option>";
            $.each(department.department_packages, function( key, value ) {
                optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.session_number==1?value.name:value.name+" "+value.session_number+" جلسة")+"</option>";
            });
            $('#edit_package #department_package').append(optionList);
            $("#edit_package #department_package option").each(function(){
                if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.department_package.id)){
                    $("#edit_package #department_package").val($(this).val()).change();
                }else if(($(this).val()!="") && (JSON.parse($(this).val()).session_number < package_data.department_package.session_number)){
                    $(this).attr("disabled",true);
                }
            });

            $('#edit_package #employee_id option').remove();
            optionList = '';
            optionList += "<option disabled selected hidden value=''>اختر</option>";
            $.each(department.doctors, function( key, value ) {
                optionList += "<option value='"+JSON.stringify(value)+"'>"+(value.name)+"</option>";
            });
            $('#edit_package #employee_id').append(optionList);
            $("#edit_package #employee_id option").each(function(){
                if(($(this).val()!="") && (JSON.parse($(this).val()).id == package_data.employee.id)){
                    $("#edit_package #employee_id").val($(this).val()).change();
                }
            });
        });

        $('#edit_package #edit_form').bind('submit', function () {
            $('#edit_package #employee_id').attr('disabled', false);
        });

        $("#edit_package #department_package").on('change', function () {
            if(JSON.parse(this.value).session_number > JSON.parse($("#edit_package #old_department_package").val()).session_number){
                $("#edit_package #save").attr("disabled", true);
                if("{{ $child_patient->nationality_id == 1 }}")
                {
                    $("#edit_package #cost").val(JSON.parse(this.value).cost);
                }else{
                    $("#edit_package #cost").val((JSON.parse(this.value).cost*15/100) + (JSON.parse(this.value).cost*1));
                }
                $("#edit_package #old_rest").val($("#edit_package #cost").val() - (parseFloat($("#edit_package #discount").val()) || 0) - (parseFloat($("#edit_package #old_paid").val()) || 0));
            }else{
                $("#edit_package input[name='appointments[]']").each(function(){
                    $(this).parent().removeClass("selected");
                    $(this).remove();
                    $("#edit_package #save").attr("disabled", false);
                });
            }
            $("#edit_package #paid_cash").val(null);
            $("#edit_package #paid_net").val(null);
            $("#edit_package #supscription_date").trigger("dp.change");
        });
        $("#edit_package #paid_cash").on('keyup', function () {
            let sum = Number($("#edit_package #paid_net").val()) + Number( $("#edit_package #paid_cash").val());
            if(sum <=  Number($("#edit_package #old_rest").val())){
                $("#edit_package #paid").val(sum);
                $("#edit_package #rest").val($("#edit_package #old_rest").val() - sum);
            }else{
                $("#edit_package #paid_cash").val(null);
                $("#edit_package #paid").val($("#edit_package #paid_net").val());
                $("#edit_package #rest").val($("#edit_package #old_rest").val() - Number($("#edit_package #paid").val()));
                alert("برجاء مراجعة المبلغ المدفوع")
            }
        });

        $("#edit_package #paid_net").on('keyup', function () {
            let sum = Number($("#edit_package #paid_net").val()) + Number($("#edit_package #paid_cash").val());
            if(sum <=  Number($("#edit_package #old_rest").val())){
                $("#edit_package #paid").val(sum);
                $("#edit_package #rest").val($("#edit_package #old_rest").val() - sum);
            }else{
                $("#edit_package #paid_net").val(null);
                $("#edit_package #paid").val($("#edit_package #paid_cash").val());
                $("#edit_package #rest").val($("#edit_package #old_rest").val() - Number($("#edit_package #paid").val()));
                alert("برجاء مراجعة المبلغ المدفوع")
            }
        });

        $("#edit_package #supscription_date").on('dp.change', function (e) {
            if($("#edit_package #supscription_date").val() != null && $("#edit_package #supscription_date").val() != ''){
                var expire_duration = JSON.parse($("#edit_package #department_package").val()).expire_duration;
                $("#edit_package #expire_date").val(moment($("#edit_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days').format('DD/MM/YYYY'));
                $('#edit_package #employee_id').trigger("change");
            }
        });

        $('#edit_package #employee_id').on('change', function () {
            if($("#edit_package #employee_id").val() != null && $("#edit_package #employee_id").val() != ''){
                var doctor = JSON.parse($('#edit_package #employee_id').val());
                var doctor_sessions = [];
                var url = '{{ route("doctor_sessions_appointments", ":id") }}';
                url = url.replace(':id', doctor.id);
                $.ajax({
                    type:'POST',
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                        from: moment($("#edit_package #supscription_date").val(), 'DD/MM/YYYY').format('YYYY-MM-DD HH:mm:ss'),
                        to: moment($("#edit_package #supscription_date").val(),'DD/MM/YYYY').add((JSON.parse($("#edit_package #department_package").val()).expire_duration)*2,'days').format('YYYY-MM-DD HH:mm:ss')
                    },
                    beforeSend: function(){
                        $("#edit_package #overlay").fadeIn(300);
                    },
                    complete: function(){
                        setTimeout(function(){
                            $("#edit_package #overlay").fadeOut(300);
                        },500);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    },
                    success: function (data) {
                        var doctor_sessions = data.sessions;
                        var doctor_appointments = data.appointments;
                        var selected_department = JSON.parse($("#edit_package #department").val());

                        var expire_duration = (moment($("#edit_package #expire_date").val(), 'DD/MM/YYYY').diff(moment($("#edit_package #supscription_date").val(), 'DD/MM/YYYY'), 'days')*2)+1;
                        var start_date = moment($("#edit_package #supscription_date").val(), 'DD/MM/YYYY');
                        $("#edit_package #schedule_div").empty();
                        // var schedule_header = "";
                        for(var index=0; index<Math.ceil(expire_duration/7); index++){
                            $("#edit_package #schedule_div").append('<div class="card booking-schedule schedule-widget" id="schedule_div_'+index+'" '+(index!=0?'hidden':'')+'>'
                                +'	<!-- Schedule Header -->'
                                +'	<div class="schedule-header">'
                                +'	  <div class="row">'
                                +'		<div class="col-md-12">'
                                +'		  <!-- Day Slot -->'
                                +'		  <div class="day-slot" id="day_slot_'+index+'">'
                                +'			<ul>'
                                +'			</ul>'
                                +'		  </div>'
                                +'		  <!-- /Day Slot -->'
                                +'		</div>'
                                +'	  </div>'
                                +'	</div>'
                                +'	<!-- /Schedule Header -->'
                                +'	<!-- Schedule Content -->'
                                +'	<div class="schedule-cont">'
                                +'	  <div class="row">'
                                +'		<div class="col-md-12">'
                                +'		  <!-- Time Slot -->'
                                +'		  <div class="time-slot" id="time_slot_'+index+'">'
                                +'			<ul class="clearfix">'
                                +'			</ul>'
                                +'		  </div>'
                                +'		  <!-- /Time Slot -->'
                                +'		</div>'
                                +'	  </div>'
                                +'	</div>'
                                +'	<!-- /Schedule Content -->'
                                +'  <div></div></div>'
                            );

                            $("#edit_package #day_slot_"+index+" ul").append('<li class="left-arrow" '+(index==0?'hidden':'')+'>'
                                +'					<a href="" onclick="return movePreviousEditPackage('+(index-1)+');">'
                                +'						<i class="fa fa-chevron-left"></i>'
                                +'					</a>'
                                +'				</li>');
                            var day=0;
                            var day_num = (parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1)>5?0:(parseInt(moment(start_date, 'DD/MM/YYYY').format("e"))+1);
                            var end_date = moment($("#edit_package #supscription_date").val(),'DD/MM/YYYY').add(expire_duration,'days');
                            while(day<6 && start_date.isBefore(end_date)){
                                if(moment(start_date, 'DD/MM/YYYY').format("ddd")=='Fri'){
                                    start_date.add(1,'days');
                                    continue;
                                }else{
                                    //Header
                                    $("#edit_package #day_slot_"+index+" ul").append('<li>'
                                        +'<span>'+moment(start_date, "DD/MM/YYYY").format("ddd")+'</span>'
                                        +'<span class="slot-date">'+moment(start_date, 'DD/MM/YYYY').format("DD/MM/YYYY")+'</span>'
                                        +'</li>');

                                    //Body
                                    var day_sessions="";
                                    for(var doctor_session=0; doctor_session<doctor_sessions.length; doctor_session++){
                                        if(doctor_sessions[doctor_session].type == 3){
                                            var session_sc = doctor_sessions[doctor_session].emp_session_time_days;
                                            for(var i=0; i<session_sc.length; i++){
                                                if(eval('session_sc['+i+'].day_'+day_num) != null){
                                                    date = moment(new Date(new Date(start_date).toDateString() +' '+ eval('session_sc['+i+'].day_'+day_num))).format('YYYY-MM-DD_HH-mm-ss');
                                                    day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraTime(this,'+start_date+')">'
                                                        +'		<span>'+(new Date(new Date().toDateString() + ' ' + eval('session_sc['+i+'].day_'+day_num)).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                                                        +'	</a>';
                                                }
                                            }
                                        }else{
                                            var attend_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].attend_time);
                                            var leave_time = new Date (new Date().toDateString() + ' ' + doctor_sessions[doctor_session].leave_time);

                                            for(var hour = 0; hour<((leave_time-attend_time)/1000/60/(selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration)) ; hour++){
                                                for(var session = 0; session<(selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_patient_number) ; session++){
                                                    date = moment(new Date(new Date(start_date).toDateString() +' '+ new Date(attend_time.getTime() + ((selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration) * hour)* 60000).toTimeString())).format('YYYY-MM-DD_HH-mm-ss');
                                                    day_sessions += '	<a id="date_'+date+'" class="timing" href="" onclick="return addExtraTime(this,'+start_date+')">'
                                                        +'		<span>'+(new Date(attend_time.getTime() + ((selected_department.department_session_settings==null?1:selected_department.department_session_settings[0].session_duration) * hour)* 60000).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true }))+'</span>'
                                                        +'	</a>';
                                                }
                                            }
                                        }
                                    }
                                    $("#edit_package #time_slot_"+index+" ul").append('<li>'
                                        +(day_sessions==""?'<a style="background-color: white;border-color: white;" class="timing"></a>':day_sessions)
                                        +'</li>');

                                    day_num ++;
                                    if(day_num > 5){
                                        day_num = 0;
                                    }
                                    start_date.add(1,'days');
                                }
                                day++;
                            }
                            $("#edit_package #day_slot_"+index+" ul").append('<li class="right-arrow" '+(index==(Math.ceil(expire_duration/7)-1)?'hidden':'')+'>'
                                +'					<a href="" onclick="return moveNextEditPackage('+(index+1)+');">'
                                +'						<i class="fa fa-chevron-right"></i>'
                                +'					</a>'
                                +'				</li>');

                        }
                        // Add appointments
                        for(var i = 0; i<doctor_appointments.length; i++){
                            $($("#edit_package a#date_"+((doctor_appointments[i].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing").not(".disabled")[0]).addClass("disabled");
                        }
                        var child_appointments = JSON.parse($("#edit_package #old_appointments").val());
                        for(var x = 0; x<child_appointments.length; x++){
                            $($("#edit_package a#date_"+((child_appointments[x].time).replace(/ /gi, "_")).replace(/:/gi, "-")+".timing")[0]).addClass("selected");
                        }
                        if(JSON.parse($("#edit_package #department_package").val()).id != JSON.parse($("#edit_package #child_package").val()).department_package_id){
                            $("#edit_package #save").attr("disabled", true);
                        }else{
                            $("#edit_package #save").attr("disabled", false);
                        }
                    }
                });
            }
        });

        $("#edit_package form").submit(function (e) {
            $("#edit_package #text-btn").attr("hidden", true);
            $("#edit_package #text-loading").attr("hidden", false);
            $("#edit_package #save").attr("disabled", true);
            return true;
        });
    });
</script>
