@extends('layouts.admin')

@section('header')
   <h3 class="panel-title"><i class="glyphicon glyphicon-edit"></i> تعديل كورس {{ $course->name }}</h3>
@endsection
@section('css')
<style type="text/css">
  
  #field {
    margin-bottom:20px;
}
.add-more{
  background-color: green;
  color: #fff;
}
.remove-me,.add-more{
  display: inline;
  padding: 9px 20px;
}
.input{
  display: inline;
}
</style>
@endsection

@section('content')
    @include('error')
    <form class="form-horizontal mt-10" action="{{ route('courses.update', $course->id) }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-body">
            @include('error')
            <div class="form-group @if($errors->has('name')) has-error @endif">
                <label class="col-sm-3 control-label text-left">إسم الكورس:<span class="asterisk"> *</span></label>
                <div class="col-sm-6">
                     <input required class="form-control" name="name" placeholder="أدخل اسم الكورس" value="{{ is_null(old('name')) ? $course->name : old('name') }}">
                      @if($errors->has("name"))
                        <span class="text-muted help-block">{{ $errors->first("name") }}</span>
                      @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('department')) has-error @endif">
              <label class="col-sm-3 text-left" for="department-field">القسم:<span class="asterisk"> *</span></label>
              <div class="col-sm-6">
                <select id="department-field" name="department" class="form-control" >
                  <option value="0">Choose</option>
                  @foreach($departments as $department)
                    <option value="{{$department->id}}" @if($course->department->id==$department->id) selected @endif>{{$department->name}}</option>
                  @endforeach
                </select>
                @if($errors->has("department"))
                  <span class="help-block">{{ $errors->first("department") }}</span>
                @endif
              </div>
            </div>
            <div class="form-group @if($errors->has('description')) has-error @endif">
                <label class="col-sm-3 control-label text-left">نبذه عن الكورس:</label>
                <div class="col-sm-6">
                     <textarea  name="description" class="form-control" rows="3">{{ is_null(old('description')) ? $course->description : old('description') }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                </div>
            </div>
            <div class="form-group @if($errors->has('goals')) has-error @endif">
              <label class="col-sm-3 control-label text-left" for="goals-field">الأهداف:</label>
              <div class="col-sm-6 control-group" id="fields">
                  <input data-items="8" name="goals[]" class="form-control" value="{{ is_null(old('goals[]')) ? $course->goals : old('goals[]') }}"/>
                  @if($errors->has("goals"))
                    <span class="help-block">{{ $errors->first("goals") }}</span>
                  @endif
              </div>
              <button class="btn btn-success" type="button">+</button>
            </div>
             <div class="form-group @if($errors->has('age')) has-error @endif">
                <label class="col-sm-3 control-label text-left">المرحلة العمرية:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="age" value="{{ is_null(old('age')) ? $course->age : old('age') }}">
                      @if($errors->has("age"))
                        <span class="text-muted help-block">{{ $errors->first("age") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('duration')) has-error @endif">
                <label class="col-sm-3 control-label text-left">المدة الزمنية:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="duration" value="{{ is_null(old('duration')) ? $course->duration : old('duration') }}">
                      @if($errors->has("duration"))
                        <span class="text-muted help-block">{{ $errors->first("duration") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('levels')) has-error @endif">
                <label class="col-sm-3 control-label text-left">المستويات:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="levels" value="{{ is_null(old('levels')) ? $course->levels : old('levels') }}">
                      @if($errors->has("levels"))
                        <span class="text-muted help-block">{{ $errors->first("levels") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('tutorials')) has-error @endif">
                <label class="col-sm-3 control-label text-left">المناهج المستخدمة:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="tutorials" value="{{ is_null(old('tutorials')) ? $course->tutorials : old('tutorials') }}">
                      @if($errors->has("tutorials"))
                        <span class="text-muted help-block">{{ $errors->first("tutorials") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_performance')) has-error @endif">
                <label class="col-sm-3 control-label text-left">كيفية التقييم:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_performance" value="{{ is_null(old('how_performance')) ? $course->how_performance : old('how_performance') }}">
                      @if($errors->has("how_performance"))
                        <span class="text-muted help-block">{{ $errors->first("how_performance") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_register')) has-error @endif">
                <label class="col-sm-3 control-label text-left">شروط التسجيل:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_register" value="{{ is_null(old('how_register')) ? $course->how_register : old('how_register') }}">
                      @if($errors->has("how_register"))
                        <span class="text-muted help-block">{{ $errors->first("how_register") }}</span>
                      @endif
                </div>
            </div>
             <div class="form-group @if($errors->has('how_degree')) has-error @endif">
                <label class="col-sm-3 control-label text-left">شروط الحصول على الشهادة:</label>
                <div class="col-sm-6">
                     <input class="form-control" name="how_degree"  value="{{ is_null(old('how_degree')) ? $course->how_degree : old('how_degree') }}">
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
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<label class="col-sm-2 control-label" for="goals-field">Goal '+ next +'</label>';
        newIn += '<input autocomplete="off" class="input form-control" id="field' + next + '" name="goals[]" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
});
</script>
@endsection