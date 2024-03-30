<x-admin.layout>

    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>تعديل  التصنيف</h3>
            </span>
            <a 
            href="{{ route('admin.Category.index') }}"
            
            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

            الغاء</a>

        </div> 
        <form method="POST" class="w-full  bg-slate-100 rounded-md border border-gray-300" action="{{ route('admin.Category.update' , $category->id) }}" class="flex gap-2">
           
            @csrf
            @method('PUT')
            <div class=" p-3 mx-auto w-1/2  ">

                <div class="flex gap-3">
                    <x-admin.input-card name="title" value="{{ $category->title }}" label="الاسم" />
                </div>

                <div class="flex gap-3 ">
                    <x-admin.textarea-card name="des" value="{{ $category->des }}" label="الوصف" />
                </div>
                <hr>
                <br>
                <button type="submit" 
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

                حفظ</button>
            
            </div>
           
      



     
        </form>
    </div>

</x-admin.layout>


{{-- 

<x-admin-layout>

    <h3> تعدل التصنيف </h3>

    <hr>
    <x-admin-contaner>
    <x-card-message></x-card-message>


    <form method="POST" class="w-75" action="{{route('admin.Category.update',$category->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">عنوان التصنيف</label>
        <input class="form-control"
        value="{{$category->title}}"
        name="title" placeholder="عنوان التصنيف" />

        @error('title')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="mb-3">
        <label class="form-label"> الايقونة</label>
        <input class="form-control"
        value="{{$category->icon}}"

        name="icon" placeholder=" الايقونة" />
        @error('icon')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>
    <div class="mb-3">
        <label class="form-label"> الوصف</label>
        <textarea  class="form-control"
        name="des" placeholder=" الوصف" cols="30" rows="10">
        {{$category->des}}
    </textarea>

        @error('des')
        <span class="helper">
        {{$message}}
        </span>
        @enderror

    </div>


    <div class="mb-3">

        <div class="px-3 pb-3">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-send me-1"></i> حفظ</button>

            <a type="button" href="{{ route('admin.Category.index') }}" class="btn btn-light">الغاء</a>
        </div>
    </div>
</form>



    </x-admin-contaner>
</x-admin-layout> --}}