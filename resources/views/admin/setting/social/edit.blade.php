
<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST"  >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> 
                    <h3>تعديل رابط</h3>

                </span>
              
                
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2 "  action="{{ route('admin.Social.update' , $social->id) }}">
                    @csrf
                    @method('PUT')
                    {{--
                    <x-admin.input-card name="email" label="البريد الالكتروني" /> --}}


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card 
                        value="{{$social->img}}"
                        label=" الصورة"
                        name="img" placeholder=" الصورة"   />
                    </div>


                    <div class=" p-3 text-slate-800 ">
                        <x-admin.input-card 
                        value="{{$social->url}}"
                        label=" الرابط"
                        name="url" placeholder=" الرابط"   />
                    </div>

            
                    <hr>
                    <button type="submit" 
                        class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                       
                          
                        حفظ</button>
                </form>


            </div>


        </div>
    </div>


</x-admin.layout>




{{-- <x-admin-layout>

    <h3>تعديل رابط</h3>
    <hr>

    <x-admin-contaner>

        <x-card-message></x-card-message>

        <form method="POST" class="w-75" action="{{ route('admin.Social.update' , $social->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"> الصورة</label>
                <input class="form-control" value="{{ $social->img }}" name="img" placeholder=" الصورة" />

                @error('img')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label"> الرابط</label>
                <input class="form-control" value="{{ $social->url }}" name="url" placeholder=" الرابط" />

                @error('url')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>





            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/Social') }}" class="btn btn-light">الغاء</a>
                </div>

            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout> --}}
