@extends((Auth::user()->type == 3)?"layouts.customer-admin":"layouts.admin")

@section('header')
<div class="page-header">
        <h1>الطالب #{{$customer->name}}</h1>

        @if(Auth::user()->type == 0)
        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-left" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('customers.edit', $customer->id) }}"><i class="glyphicon glyphicon-edit"></i> تعديل</a>
                <button type="submit" class="btn btn-danger">حذف <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
        @endif
    </div>
@endsection

@section('content')

      <h3>المعلومات الشخصية</h3>

    <div class="row">
        <div class="col-md-12">

            <form action="#">
               
                <div class="form-group col-sm-3">
                     <label for="name">الإسم</label>
                     <p class="form-control-static">{{$customer->name}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="email">البريد الإلكتروني</label>
                     <p class="form-control-static">{{$customer->email}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="nationality">الجنسية</label>
                     <p class="form-control-static">{{$customer->nationality}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="birthdate">تاريخ الميلاد</label>
                     <p class="form-control-static">{{$customer->birthdate}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="gender">الجنس</label>
                     <p class="form-control-static">{{$customer->gender}}</p>
                </div>
                    
                    <div class="form-group col-sm-3">
                     <label for="how_know">كيف توصل إلينا</label>
                     <p class="form-control-static">{{$customer->how_knows->name}}</p>
                </div>

                

                @if(Auth::user()->type == 0)
                    <div class="form-group col-sm-3">
                     <label for="status">نوع التسجيل</label>
                     <p class="form-control-static">{{$customer->status}}</p>
                </div>
                <div class="form-group col-sm-3">
                     <label for="type">نوعه</label>
                     <p class="form-control-static">@if($customer->type == 1) طفل @else بالغ @endif</p>
                </div>
                @endif
                   <div class="form-group col-sm-3">
                     <label for="type">تاريخ التسجيل</label>
                     <p class="form-control-static">{{$customer->created_at}}</p>
                </div>
                @if($customer->infs != NULL)

                @if($customer->type == 2)
        <div class="col-md-12">
      <h3>بيانات التواصل</h3>
      </div>

                    <div class="form-group col-sm-3">
                     <label for="address">العنوان الشخصي</label>
                     <p class="form-control-static">{{$customer->infs->address}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="mobile1">رقم الموبايل</label>
                     <p class="form-control-static">{{$customer->infs->mobile1}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="mobile2">رقم الموبايل 2</label>
                     <p class="form-control-static">{{$customer->infs->mobile2}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="phone">رقم المنزل</label>
                     <p class="form-control-static">{{$customer->infs->phone}}</p>
                </div>
                  
                    <div class="form-group col-sm-3">
                     <label for="job_status">المهنة</label>
                     <p class="form-control-static">{{$customer->infs->job->name}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="work">WORK</label>
                     <p class="form-control-static">{{$customer->infs->work}}</p>
                </div>

                @else
        <div class="col-md-12">

      <h3>بيانات الطفل الدراسية</h3>
      </div>

                    <div class="form-group col-sm-3">
                     <label for="school_name">إسم المدرسة</label>
                     <p class="form-control-static">{{$customer->infs->school_name}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="school_type">نوع المدرسة</label>
                     <p class="form-control-static">{{$customer->infs->school_type}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="school_address">عنوان المدرسة</label>
                     <p class="form-control-static">{{$customer->infs->school_address}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="year">العام الدراسي</label>
                     <p class="form-control-static">{{$customer->infs->year}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="level">السنه الدراية الحالية</label>
                     <p class="form-control-static">{{$customer->infs->level}}</p>
                </div>
                    <div class="form-group col-sm-3">
                     <label for="mobile">رقم الموبايل</label>
                     <p class="form-control-static">{{$customer->infs->mobile}}</p>
                </div>


<?php $i="الأول"; ?>
      @if($customer->infs->parents)
        @foreach($customer->infs->parents as $kid_parent)

<div class="col-md-12">
    <h3> بيانات ولي الأمر {{$i}}</h3>
</div>
<?php $i="الثاني"; ?>
             <div class="row">
        <div class="col-md-12">

            <form action="#">
               
                <div class="form-group col-sm-4">
                     <label for="name">إسم ولي الأمر</label>
                     <p class="form-control-static">{{$kid_parent->parent->name}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="relative">صلة ولي الأمر</label>
                     <p class="form-control-static">{{$kid_parent->parent->relative}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="mobile1">رقم الموبايل</label>
                     <p class="form-control-static">{{$kid_parent->parent->mobile1}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="mobile2">رقم الموبايل 2</label>
                     <p class="form-control-static">{{$kid_parent->parent->mobile2}}</p>
                </div>
                    <div class="form-group col-sm-4">
                     <label for="phone">رقم المنزل</label>
                     <p class="form-control-static">{{$kid_parent->parent->phone}}</p>
                </div>
                   
                    <div class="form-group col-sm-4">
                     <label for="email">البريد الإلكتروني</label>
                     <p class="form-control-static">{{$kid_parent->parent->email}}</p>
                </div>
                 <div class="form-group col-sm-5">
                     <label for="address">العنوان</label>
                     <p class="form-control-static">{{$kid_parent->parent->address}}</p>
                </div>
                    
            </form>
            </div>
            </div>

        @endforeach

      @endif

                @endif
                @endif

                 <div class="col-md-12">

                  <h3>الكورسات الملتحق بها الطالب</h3>
                  </div>

                <div class="col-md-12">
             
                     @if($customer->program )
                         @foreach($customer->program as $program)
                         <p class="form-control-static">{{$program->program->course->name}}</p>
                         @endforeach
                    @endif
             
                </div>
            </form>
            <div class="row col-md-12 pull-right">
            <a class="btn btn-link" href="{{url()->previous() }}"><i class="glyphicon glyphicon-backward"></i>  الرجوع</a>
            </div>

        </div>
    </div>

@endsection