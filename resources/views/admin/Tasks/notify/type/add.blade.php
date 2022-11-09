<x-admin-layout>

    <h3>اضافة نوع سجل  </h3>

    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" class="w-75" action="{{ url('/admin/NotifyType') }}">
            @csrf

            


            <div class="mb-3">
                <label for="projectName" class="form-label">اضافة نوع تنبيه  </label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                placeholder="عنوان التصنيف">
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

      



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/TasksNotify') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>





        </form>

    </x-admin-contaner>
</x-admin-layout>
