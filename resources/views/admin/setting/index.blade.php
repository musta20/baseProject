<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST">
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> اعداد الموقغ</span>
                <a type="submit" href="{{ route('admin.inbox',2) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    عودة</a>
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form enctype="multipart/form-data" action="{{ route('admin.Setting.update' , $setting->id) }}">
                    @csrf
                    @method('PUT')

                    <x-admin.input-card value="{{ $setting->title }}" name="title" placeholder="عنوان الموقع" label="عنوان الموقع" />



                    @if ($setting->logo)
                    <img width="80" src="{{url('storage/'.$setting->logo)}}">
                    @endif


                    <div class="mb-3">
                        <label class="form-label">شعار الموقع </label>
                        <input class="form-control" type="file" name="logo" placeholder="عنوان التصنيف" />
                        @error('logo')
                        <span class="helper">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <x-admin.textarea-card label="وصف الموقع" name="des" value="{{ $setting->des }}"  placeholder=" وصف  الموقع" />

                    <x-admin.textarea-card label="وصف اسفل الموقع" name="footertext" value="{{ $setting->footertext}}" />

                            <x-admin.textarea-card value="{{ $setting->map }}"  label="رابط موقع جوجل " name="map"
                                placeholder="رابط موقع جوجل " />

                            <x-admin.textarea-card value="{{ $setting->keyword }}"  label="  كلمات مفتاحية" name="keyword"
                                placeholder="  كلمات مفتاحية" />

                            <x-admin.textarea-card value="{{ $setting->copyright }}" name="copyright"
                                placeholder="حقوق النشر"  label="حقوق النشر" />

                            <x-admin.textarea-card value="{{ $setting->billterm }}" name="billterm"
                                placeholder=" شروط الفاتورة"   label=" شروط الفاتورة" />



                            <x-admin.input-card value="{{ $setting->email }}" name="email"
                                placeholder="البريد الالكتروني"  label="البريد الالكتروني" />

                            <x-admin.input-card value="{{ $setting->weekwork }}" placeholder="مواعيد العمل"
                                name="weekwork" label="مواعيد العمل " />

                            <x-admin.input-card value="{{ $setting->phone }}" name="phone" label="رقم الهاتف" placeholder="رقم الهاتف" />







                            <span>

                            </span>

                            <hr>
                            <button type="submit"
                                class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                </svg>

                                حفظ</button>
                </form>

            </div>

        </div>


    </div>
    </div>


</x-admin.layout>
{{--
<x-admin-layout>
    <h3>اعداد الموقع</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message />

        <form method="POST" class="w-75" enctype="multipart/form-data"
            action="{{ route('admin.Setting.update' , $setting->id) }}">
            @csrf
            @method('PUT')
















            <div class="mb-3">
                <label class="form-label"> العنوان </label>
                <input value="{{ $setting->adress }}" class="form-control" name="adress" placeholder="   الموقع" />
                @error('adress')
                <span class="helper">
                    {{ $message }}
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> الجوال </label>
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

                    <a type="button" href="{{ route('admin.basic') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>


        <x-model-box></x-model-box>

    </x-admin-contaner>
</x-admin-layout> --}}