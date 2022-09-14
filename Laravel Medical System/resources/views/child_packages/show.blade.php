@extends('layouts.guest')
@section('title','مواعيد الحجز')
@section('content')

<!-- Page Wrapper -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="invoice-content m-5">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="{{asset('assets/img/logo.png')}}" alt="logo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h4>مواعيد الحجز</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">اسم المريض: </strong>
                                    {{ $child_package->child_patient->fullname }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">قسم: </strong>
                                    الأطفال ({{ $child_package->department_package->department->name }})
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">نوع الخدمة: </strong>
                                    {{ is_null($child_package->department_package)?'--':$child_package->department_package->name.' '. ($child_package->department_package->session_number==1?'':$child_package->department_package->session_number.' جلسات') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">الطبيب المعالج: </strong>
                                    {{ is_null($child_package->employee)?'--':$child_package->employee->name }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">تاريخ الحجز: </strong>
                                    {{ $child_package->supscription_date }}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">تاريخ الانتهاء: </strong>
                                    {{ $child_package->expire_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">السعر: </strong>
                                    {{ $child_package->cost }} ريال
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    @if($child_package->discount>0)
                                        <strong class="customer-text d-inline mr-3">الخصم: </strong>
                                        {{ $child_package->discount }} ريال
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">المبلغ المدفوع: </strong>
                                    {{ $child_package->paid }} ريال
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="invoice-info">
                                    <strong class="customer-text d-inline mr-3">المتبقي: </strong>
                                    {{ $child_package->rest }} ريال
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الموعد</th>
                                            <th class="text-center">الحالة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($child_package->child_appointments as $appointment)
                                            <tr>
                                                <td class="text-center">{{ $appointment->name }}</td>
                                                <td class="text-center">
                                                    <span class="text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->translatedFormat('l') }} </span>
                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('Y/m/d') }}
                                                    <span class="text-info">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->time)->format('a h:i') }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {!! config('enums.patient_appointment_status.'.$appointment->status) !!}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Information -->
                    <div class="submit-section proceed-btn text-center pt-4">
                        <a href="" id="print" onclick="event.preventDefault();window.print();" class="btn btn-primary submit-btn">
                            طباعة
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="footer_name">
        <img src="{{asset('assets/img/print_footer.jpg')}}" class="img-fluid" alt="footer">
    </div>
</div>
<style>
    #footer_name{
        display: none !important;
    }
    * { -webkit-print-color-adjust: exact !important;}
    @media print {
        @page  {
            margin: 0;
        }
        .invoice-content, .badge{
            border: 0;
        }
        #print{
            display:none !important;
        }
        #footer_name{
            display:block !important;
            position: fixed;
            bottom: 0;
        }
    }
</style>
@endsection
