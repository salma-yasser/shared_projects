@extends('layouts.admin')

@section('header')
   <h3 class="panel-title"><i class="glyphicon glyphicon-plus"></i> دورة جديد</h3>
@endsection
@section('css')
<style type="text/css">
.field{
  margin-bottom: 10px;
}
.btn-group{
  width: 5%;
}
</style>
@endsection

@section('content')
    @include('error')
    <form class="form-horizontal" action="{{ route('courses.store') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-body">
            @include('error')
            <div class="form-group @if($errors->has('name')) has-error @endif">
              <label class="col-sm-3 text-left">إسم الدورة:<span class="asterisk"> *</span></label>
              <div class="col-sm-6">
                   <input required class="form-control" name="name" placeholder="أدخل اسم الدورة" value="{{ old('name') }}">
                    @if($errors->has("name"))
                      <span class="help-block">{{ $errors->first("name") }}</span>
                    @endif
              </div>
            </div>
            <div class="form-group @if($errors->has('department')) has-error @endif">
              <label class="col-sm-3 text-left" for="department-field">القسم:<span class="asterisk"> *</span></label>
              <div class="col-sm-6">
                <select id="department-field" name="department" class="form-control" >
                  <option value="0">Choose</option>
                  @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
                @if($errors->has("department"))
                  <span class="help-block">{{ $errors->first("department") }}</span>
                @endif
              </div>
            </div>
            <div class="form-group @if($errors->has('description')) has-error @endif">
              <label class="col-sm-3 text-left">نبذه عن الدورة:</label>
              <div class="col-sm-6">
                   <textarea  name="description" class="form-control" rows="3"></textarea>
                     @if($errors->has("description"))
                      <span class="help-block">{{ $errors->first("description") }}</span>
                     @endif
              </div>
            </div>
            <!-- <div class="form-group @if($errors->has('goals')) has-error @endif">
              <label class="col-sm-3 text-left" for="goals-field">الأهداف:</label>
              <div class="col-sm-6 control-group" id="fields">
                  <input data-items="8" name="goals[]" class="form-control"/>
                  @if($errors->has("goals"))
                    <span class="help-block">{{ $errors->first("goals") }}</span>
                  @endif
              </div>
              <button class="btn btn-success" type="button">+</button>
            </div> -->
            <div class="form-group @if($errors->has('goals')) has-error @endif">
              <label class="col-sm-3 text-left" for="goals-field">الاهداف:</label>
              <input type="hidden" id="count" value="1" />
              <div class="feild-group col-sm-6">
                <input id="field1"  data-items="8" name="goals[]" class="field form-control"/>
              </div>
              <div class="btn-group col-sm-1">
                <button id="btn1" class="field form-control btn btn-success add-more">+</button>
              </div>
               @if($errors->has("goals"))
                <span class="help-block">{{ $errors->first("goals") }}</span>
               @endif
            </div>

             <div class="form-group @if($errors->has('age')) has-error @endif">
                <label class="col-sm-3 text-left">المرحلة العمرية:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="age" value="{{ old('age') }}">
                      @if($errors->has("age"))
                        <span class="text-muted help-block">{{ $errors->first("age") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('duration')) has-error @endif">
                <label class="col-sm-3 text-left">المدة الزمنية:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="duration" value="{{ old('duration') }}">
                      @if($errors->has("duration"))
                        <span class="text-muted help-block">{{ $errors->first("duration") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('levels')) has-error @endif">
                <label class="col-sm-3 text-left">المستويات:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="levels" value="{{ old('levels') }}">
                      @if($errors->has("levels"))
                        <span class="text-muted help-block">{{ $errors->first("levels") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('tutorials')) has-error @endif">
                <label class="col-sm-3 text-left">المناهج المستخدمه:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="tutorials" value="{{ old('tutorials') }}">
                      @if($errors->has("tutorials"))
                        <span class="text-muted help-block">{{ $errors->first("tutorials") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_performance')) has-error @endif">
                <label class="col-sm-3 text-left">كيفية التقييم:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_performance" value="{{ old('how_performance') }}">
                      @if($errors->has("how_performance"))
                        <span class="text-muted help-block">{{ $errors->first("how_performance") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_register')) has-error @endif">
                <label class="col-sm-3 text-left">شروط التسجيل:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_register" value="{{ old('how_register') }}">
                      @if($errors->has("how_register"))
                        <span class="text-muted help-block">{{ $errors->first("how_register") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_degree')) has-error @endif">
                <label class="col-sm-3 text-left">شروط الحصول على الشهادة:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_degree"  value="{{ old('how_degree') }}">
                      @if($errors->has("how_degree"))
                        <span class="text-muted help-block">{{ $errors->first("how_degree") }}</span>
                      @endif
                </div>
            </div>
        </div>
        <div class="form-footer">
            <div class="pull-left">
              <button class="btn btn-success" type="submit">&nbsp حفظ &nbsp</button>
                <a class="btn btn-danger mr-5" href="{{ route('courses.index') }}">&nbsp الغاء &nbsp</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </form>
@endsection
@section("scripts")
<script type="text/javascript">

  $(document).ready(function(){
    $(".add-more").click(function(e){
        e.preventDefault();
        var current = parseInt($('#count').val(), 10);
        var newInput = '<input id="field' + (current + 1) + '" name="goals[]" class="field form-control" >';
        var removeButton = '<button id="btn' + (current + 1) + '" class="field form-control btn btn-danger remove-me" >-</button>';
        $("#field" + current).after(newInput);
        $("#btn" + current).after(removeButton);
        current = current + 1;
        $("#count").val(current);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
                $("#count").val(parseInt($('#count').val(), 10) - 1);
            });
    });
    

    
});
</script>
@endsection