
@extends('admin.layout.index')
@section('content')
<section class="list border">
<div class="controller">
<h3>اعداد الموقع</h3>
<x-card-message />
</div>
<form method="POST" action="{{url('/admin/Setting/'.$setting->id)}}">
  @csrf
  @method('PUT')
  <div class="formLaple" >
      <label>عنوان الموقع</label>
      <input class="form-input"
      value="{{$setting->title}}"
      
      name="title" placeholder="عنوان التصنيف" />

      @error('title')
      <span class="helper">
      {{$message}}
      </span>
      @enderror

  </div>

  <div class="formLaple" >
      <label> وصف الموقع</label>
      <textarea class="form-input" name="des"
       placeholder=" وصف الموقع" cols="30" rows="10">
      
       {{$setting->des}}

      </textarea>
      @error('des')
      <span class="helper">
      {{$message}}
      </span>
      @enderror
  </div>


  <div class="formLaple" >
    <label>   رابط الخريطة</label>
    <input class="form-input"
    value="{{$setting->map}}"

    name="map" placeholder="  رابط موقع جوجل " />
    @error('map')
    <span class="helper">
    {{$message}}
    </span>
    @enderror
</div>

  <div class="formLaple" >
    <label>  كلمات مفتاحية</label>
    <input class="form-input"
    value="{{$setting->keyword}}"

    name="keyword" placeholder="  كلمات مفتاحية" />
    @error('keyword')
    <span class="helper">
    {{$message}}
    </span>
    @enderror
</div>

<div class="formLaple" >
  <label>  شروط الفاتورة </label>
  <input class="form-input"
  value="{{$setting->billterm}}"

  name="billterm" placeholder="   شروط الفاتورة" />
  @error('billterm')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>



<div class="formLaple" >
  <label>   حقوق النشر</label>
  <input
  value="{{$setting->copyright}}"

  class="form-input" name="copyright" placeholder="حقوق النشر" />
  @error('copyright')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>


<div class="formLaple" >
  <label>    اسفل الصفحة</label>
  <input
  value="{{$setting->footer}}"

  class="form-input" name="footer" placeholder="اسف الصفحة" />
  @error('footer')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>



<div class="formLaple" >
  <label>    البريد الالكتروني </label>
  <input
  value="{{$setting->email}}"

  class="form-input" name="email" placeholder="   الموقع" />
  @error('email')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>





<div class="formLaple" >
  <label>   مواعيد العمل </label>
  <input
  value="{{$setting->adress}}"

  class="form-input" name="weekwork" placeholder="    مواعيد العمل " />
  @error('weekwork')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>



<div class="formLaple" >
  <label>   العنوان </label>
  <input
  value="{{$setting->adress}}"

  class="form-input" name="adress" placeholder="   الموقع" />
  @error('adress')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>

<div class="formLaple" >
  <label>   الجوال </label>
  <input
  value="{{$setting->phone}}"

  class="form-input" name="phone" placeholder="   الموقع" />
  @error('phone')
  <span class="helper">
  {{$message}}
  </span>
  @enderror
</div>








<div>
  <button class="btn btn-Primary" >حفظ</button>

</div>
</form>
</section>
<script>
  function showModel(e) {

   return `<form method='POST' 
        
        action='{{url('/admin/Category/${e.id}')}}' >
        @method('DELETE')
        @csrf
        <div class='formLaple' >
            <label> هل انت متأكد من حذف العنصر</label>
            <h3>${e.title}</h3>
            <button type='submit' class='btn btn-Danger' >حذف</button>
        </div>
        </form>`
    
  }
</script>

<x-model-box></x-model-box>

@endsection