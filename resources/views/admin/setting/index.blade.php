<x-admin-layout>
    <h3>اعداد الموقع</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />
        
        <form method="POST" class="w-75" enctype="multipart/form-data" action="{{ url('/admin/Setting/' . $setting->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label  class="form-label">عنوان الموقع</label>
                <input  class="form-control" value="{{ $setting->title }}" name="title" placeholder="عنوان التصنيف" />
                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">

                @if ($setting->logo)
                    <img width="80" src="{{url('storage/'.$setting->logo)}}" >
                @endif

            </div>

            <div class="mb-3">
                <label  class="form-label">شعار الموقع </label>
                <input  class="form-control" 
                type="file"

                name="logo" placeholder="عنوان التصنيف" />
                @error('logo')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> وصف الموقع</label>
                <textarea class="form-control" name="des" placeholder=" وصف الموقع" cols="30" rows="10">
      
       {{ $setting->des }}

      </textarea>
                @error('des')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> نص اسف الصفحة </label>
                <textarea class="form-control" name="footertext" placeholder=" وصف الموقع" cols="30" rows="10">
      
       {{ $setting->footertext }}

      </textarea>
                @error('footertext')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            
            <div class="mb-3">
                <label  class="form-label"> رابط الخريطة</label>
                <input  class="form-control" value="{{ $setting->map }}" name="map" placeholder="  رابط موقع جوجل " />
                @error('map')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> كلمات مفتاحية</label>
                <input  class="form-control" value="{{ $setting->keyword }}" name="keyword"
                    placeholder="  كلمات مفتاحية" />
                @error('keyword')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> شروط الفاتورة </label>
                <textarea cols="15" rows="5" class="form-control" name="billterm"
                    placeholder="   شروط الفاتورة" >{{ $setting->billterm }}</textarea>
                @error('billterm')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            <div class="mb-3">
                <label  class="form-label"> حقوق النشر</label>
                <input value="{{ $setting->copyright }}" class="form-control" name="copyright"
                    placeholder="حقوق النشر" />
                @error('copyright')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <label  class="form-label"> اسفل الصفحة</label>
                <input value="{{ $setting->footer }}" class="form-control" name="footer" placeholder="اسف الصفحة" />
                @error('footer')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            <div class="mb-3">
                <label  class="form-label"> البريد الالكتروني </label>
                <input value="{{ $setting->email }}" class="form-control" name="email" placeholder="   الموقع" />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>





            <div class="mb-3">
                <label  class="form-label"> مواعيد العمل </label>
                <input value="{{ $setting->weekwork }}" class="form-control" name="weekwork"
                    placeholder="    مواعيد العمل " />
                @error('weekwork')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            <div class="mb-3">
                <label  class="form-label"> العنوان </label>
                <input value="{{ $setting->adress }}" class="form-control" name="adress" placeholder="   الموقع" />
                @error('adress')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> الجوال </label>
                <input value="{{ $setting->phone }}" class="form-control" name="phone" placeholder="   الموقع" />
                @error('phone')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>








            <div class="mb-3">

              <div class="px-3 pb-3">
                  <button type="submit" class="btn btn-primary">
                      <i class="mdi mdi-send me-1"></i> حفظ</button>

                  <a type="button" href="{{ url('admin/basic') }}" class="btn btn-light">الغاء</a>
              </div>
          </div>
        </form>

        <script>
            function showModel(e) {

                return `<form method='POST' 
        
        action='{{ url('/admin/Category/${e.id}') }}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label  class="form-label"> هل انت متأكد من حذف العنصر</label>
            <h3>${e.title}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`

            }
        </script>

        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout>
