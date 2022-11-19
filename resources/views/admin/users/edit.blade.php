<x-admin-layout>
    <h3>تعديل مستخدم</h3>
    <hr>
    <x-admin-contaner>

        <x-card-message></x-card-message>

        <form method="POST" enctype="multipart/form-data" class="w-75" action="{{ url('/admin/Users/' . $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label"> الاسم </label>
                <input class="form-control" value="{{ $user->name }}" name="name" placeholder="الاسم" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            @if ($user->img)
            <div class="mb-3">
                <img width="80" src="{{url('storage/'.$user->img)}}" alt="">
            </div>
            @endif



            <div class="mb-3">
                <label class="form-label"> صورة شخصية </label>
                <input class="form-control" type="file" name="img" placeholder="img" />
                @error('img')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label" > الصلاحية</label>

                @if ($user->hasAnyRole($role))

                    <select class="form-select select2 select2-hidden-accessible" name="role">
                        <option value="{{ $user->roles->pluck('id')[0] }}">{{ __($user->roles->pluck('name')[0]) }}</option>
                        @foreach ($role as $item)
                            @if ($user->roles->pluck('name')[0] != $item->name)
                                <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                            @endif
                        @endforeach

                    </select>
                @else
                    <select class="form-select select2 select2-hidden-accessible" name="role">
                        @foreach ($role as $item)
                            <option value="{{ $item->id }}">{{ __($item->name) }}</option>
                        @endforeach
                    </select>



                @endif




                @error('role')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> البريد الالكتروني </label>
                <input class="form-control" type="email" value="{{ $user->email }}" name="email"
                    placeholder="البريد الالكتروني " />
                @error('email')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> إنشاء كلمة مرور جديدة </label>
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

                    <a type="button" href="{{ url('admin/UsersList') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>
