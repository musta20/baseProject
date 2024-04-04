<x-admin.layout>
    <div class="px-5  pt-5">
        <div method="POST" >
            @csrf
            <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
                <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600"> تعديل وظيفة</span>
                <a type="submit" href="{{ route('admin.Jobs.index') }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    عودة</a>
            </div>
            <div class=" p-3 bg-slate-100 rounded-md border border-gray-300 ">
                <form class="mx-auto w-1/2 "  method="POST" action="{{ route('admin.Jobs.update',$Jobs->id) }}">
                    @csrf
                    @method('PUT')
                    {{--
                    <x-admin.input-card name="email" label="البريد الالكتروني" /> --}}


                    <div class=" p-3 text-slate-800 ">

                        <x-admin.input-card label="المسمى الوظيفي" value="{{ $Jobs->title }}"  placeholder="المسمى الوظيفي" name="title"  />
                    </div>

                    <div class=" p-3 text-slate-800 ">
                        <x-admin.select-input label="مقر الوظيفة" :selected="$Jobs->job_cities_id" :options="$jobCity" name="job_cities_id"  />
                    </div>

                    <span>
                        <x-admin.textarea-card   value="{{ $Jobs->des }}" name="des" placeholder="التفاصيل" label="الوصف" />

                    </span>

                    <hr>
                    <button type="submit" 
                        class="bg-blue-500 my-4 flex gap-2 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                       
                          
                        حفظ</button>
                </form>


            </div>


        </div>
    </div>


</x-admin.layout>
{{-- 
<x-admin-layout>
    <h3>تعديل وظيفة</h3>
    <hr>
    <x-admin-contaner>

        <form method="POST" class="w-75" action="{{ route('admin.Jobs.update' , $jobs->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label"> المسمى الوظيفي</label>
                <input class="form-control" value="{{ $jobs->title }}" name="title" placeholder=" المسمى الوظيفي " />

                @error('title')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label"> مقر الوظيفة</label>

                <select class="form-select select2 select2-hidden-accessible" name="job_cities_id">
                    <option value="{{ $currentcity->id }}">{{ $currentcity->name }}</option>

                    @foreach ($jobCity as $item)
                        @if ($jobs->job_cities_id != $item->id)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>


                @error('job_cities_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label"> الوصف</label>
                <textarea class="form-control" name="des" placeholder=" الوصف" cols="30" rows="10">
        {{ $jobs->des }}
    </textarea>

                @error('des')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ route('admin.Jobs.index') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>



    </x-admin-contaner>
</x-admin-layout> --}}
