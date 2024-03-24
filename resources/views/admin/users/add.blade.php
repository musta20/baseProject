<x-admin-layout>
    <h3>انشاء مستخدم</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" class="w-75" enctype="multipart/form-data"
         action="{{ route('admin.UsersList') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label"> الاسم </label>
                <input class="form-control" name="name" placeholder="الاسم" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> الصلاحية</label>
                <select class="form-select select2 select2-hidden-accessible" name="role">
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                    @endforeach
                </select>
                @error('job_cities_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> البريد الالكتروني </label>
                <input class="form-control" type="email" name="email" placeholder="البريد الالكتروني " />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label"> كلمة المرور </label>
                <input class="form-control" type="password" name="password" placeholder="كلمة المرور " />
                @error('password')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ route('admin.UsersList') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
