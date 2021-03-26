                <div class="form-group col-sm-4 ">
                     <label class="label-control" for="name">إسم الكورس</label>
                     <p class="form-control-static">{{$course->name}}</p>
                </div>
                    
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="type">شهري/ثانوي</label>
                     <p class="form-control-static">{{$course->type}}</p>
                </div>

                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="age">المرحلة العمرية </label>
                     <p class="form-control-static">{{$course->age}}</p>
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="duration">المدة الزمنية </label>
                     <p class="form-control-static">{{$course->duration}}</p>
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="levels">المستويات</label>
                     @if($levels)
                     @foreach($levels as $level)
                     <p class="form-control-static">{{$level->name}}</p>
                     @endforeach
                     @endif
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="tutorials">الماده العلمية</label>
                     <p class="form-control-static">{{$course->tutorials}}</p>
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="how_performance">كيفية التقييم</label>
                     <p class="form-control-static">{{$course->how_performance}}</p>
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="how_register">كيفية التسجيل</label>
                     <p class="form-control-static">{{$course->how_register}}</p>
                </div>
                    <div class="form-group col-sm-4 ">
                     <label class="label-control" for="how_degree">كيفية التقويم</label>
                     <p class="form-control-static">{{$course->how_degree}}</p>
                </div>

                <div class="form-group col-sm-6 ">
                     <label class="label-control" for="goals"> اهداف البرنامج</label>
                     <p class="form-control-static">{{$course->goals}}</p>
                </div>
                <div class="form-group col-sm-6 ">
                     <label class="label-control" for="description">نبذة عن البرنامج </label>
                     <p class="form-control-static">{{$course->description}}</p>
                </div>