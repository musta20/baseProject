<x-layout>

    <section class="mainPage">


        <form method="POST" class="colorTexetFooter" action="{{route('SaveJobs')}}" enctype="multipart/form-data">
        
            @csrf

            <h3 class="colorTexetFooter">ارسال طلب التوظيف</h3>
            @if (session()->has('messages'))
                <div class="alert alert-success">
                    <p><strong>{{ session('messages') }} </strong></p>

                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p><strong>حدث خطاء</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-box">
                <div> الاسم </div>
                <input type="text" name="name" class="input-form" id="name" value="{{ old('name') }}"
                    placeholder="الاسم كامل">
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="TowInput">
                <input type="email" name="email" value="{{ old('email') }}" class="input-form" id="email"
                    placeholder="البريد الالكتروني">
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
                <input type="nubmer" value="{{ old('phone') }}" name="phone" class="input-form" id="phone"
                    placeholder="رقم الجوال">

                @error('phone')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="TowInput">

                <select class="input-form w-50" style="height:3.5em !important;" name="cert">
                    <option selected> المستوى التعليمي </option>
                    <option value="ثانوية  | Highschool"> ثانوية | Highschool </option>
                    <option value="دبلوم | Diploma"> دبلوم | Diploma </option>
                    <option value="بكالوريوس | Bachelor"> بكالوريوس | Bachelor </option>
                    <option value="ماجستير | Master"> ماجستير | Master </option>
                    <option value="دكتوراة | A Ph.D"> دكتوراة | A Ph.D </option>
                </select>

                @error('cert')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

                <input type="text" name="majer" value="{{ old('majer') }}" class="input-form" id="j_special"
                    placeholder="التخصص الدراسي">

                @error('majer')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="input-box">
                <textarea name="exp_des" id="exp_des" class="input-form" cols="30" rows="5"
                    placeholder="الخبرة  - اكتب لايوجد في حالة عدم وجود خبرة">{{ old('exp_des') }}</textarea>
                @error('exp_des')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="TowInput">


                <input type="number" name="exp" class="input-form" id="exp"
                value="{{old('exp')}}"
                    placeholder="عدد سنوات الخبرة - اكتب صفر في حالة عدم وجود خبرة" />
                @error('exp')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror


                <select style="height:3.5em !important;" class="input-form w-50" name="job_id">
                    <option selected> الوظيفة المرغوبة </option>
                    @foreach ($jobs as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                    @error('job_id')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </select>

            </div>
            <div class="TowInput">


                <select class="input-form w-50" style="height:3.5em !important;" name="city">
                    <option selected> مدينة الاقامة </option>
                    <option value="الرياض"> الرياض | Riyadh </option>
                    <option value="القصيم"> القصيم | Qassim </option>
                    <option value="حائل"> حائل | Hail </option>
                    <option value="الدمام"> الدمام | Dammam </option>
                    <option value="حفر الباطن "> حفر الباطن | Hafar Al-batin </option>
                    <option value="المدينة المنورة"> المدينة المنورة | Medina </option>
                    <option value="مكة المكرمة"> مكة المكرمة | Makkah </option>
                    <option value="ينبع"> ينبع | Yanbu </option>
                    <option value="الطائف"> الطائف | Taif </option>
                    <option value="الباحة"> الباحة | Al-Baha </option>
                    <option value="عسير"> عسير | Asser</option>
                    <option value="ابها"> ابها | Abha</option>
                    <option value="نجران"> نجران | Najran </option>
                    <option value="جازان"> جازان | Jizan </option>
                    <option value="الظهران"> الظهران| Dhahran </option>
                    <option value="الجوف"> الجوف | Al-jouf </option>
                    <option value="تبوك"> تبوك | Tabuk </option>
                    <option value="المجمعة"> المجمعة | Al-Majmaah </option>
                    <option value="الخبر"> الخبر | Khobar </option>
                    <option value="الاحساء"> الاحساء | Al-Ahsa </option>
                    <option value="الجبيل"> الجبيل | Jubail </option>
                    <option value="الدوادمي"> الدوادمي | Al-Dawadmi </option>
                    <option value="الخرج"> الخرج | Al-Kharag </option>
                </select>


              
                @error('city')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>









            <div class="input-box">
                <fieldset class="input-form">
                    <select style="height:3em !important;" class="input-form" name="job_city"id="job_city">
                        <option selected>مقر الوظيفة * </option>
                        @foreach ($jobcity as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>
            </div>







            </div>
            <div class="input-box">
                <textarea name="about" id="about" class="input-form" cols="30" 
                placeholder="تحدث عن نفسك"
                rows="3"
                  >{{ old('about') }}</textarea>
                @error('about')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="input-box">
                <div class="input-form ">
                    <label for="first-name-vertical"> اضف سيرتك الذاتية </label>
                    <input type="file" name="cv" class="input-form" id="cv">
                    <label for="first-name-vertical"> يجب ان يكون امتداد الملف : pdf </label>
                    @error('cv')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <!--div class="col-md-6 mb-1">
    <div class="form-group">
    <label for="first-name-vertical"> </label>
        <input type="file" name="j_works" class="form-control" id="j_works" >
        <label for="first-name-vertical"> يجب ان يكون امتداد الملف :  pdf , jpg , png , jpeg , svg , gif </label>
        
    </div>
</div-->


            <div class="input-box">
                <button type="submit" name="submit" class="btn w-50">ارسال الطلب</button>
            </div>
            </div>
        </form>
    </section>
    <style>
        .helper {
            text-shadow: none;
            color: #df1e00;
        }
    </style>
</x-layout>
