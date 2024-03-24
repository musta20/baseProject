<x-admin-layout>
    <h3> تعديل بيانات السجل</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" action="{{ route('admin.NotifyType.update' , $NotifyType->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label  class="form-label" > الاسم </label>
                <input  class="form-control" value="{{ $NotifyType->name }}" name="name" placeholder="عنوان التصنيف" />

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

                    <a type="button" href="{{ route('admin.TasksNotify.index') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>






        </form>
    </x-admin-contaner>
</x-admin-layout>
