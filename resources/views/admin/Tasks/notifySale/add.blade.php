<x-admin-layout>
    <h3> اضافة بيانات المبيعات</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" action="{{ url('/admin/NotifySales/') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label"> نوع السجل</label>
                <select class="form-control"   name="type">
                    @foreach ($types as $item)
                        <option value={{ $item->id }} >{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3" >
                <label  class="form-label">الى الموظف : </label>
                <select name="user_id" class="form-control" >
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>

                @error('user_id')
                <span class="helper">
                {{ $message }}
                </span>
                @enderror
            </div>
            <div  class="mb-3">
                <label class="form-label"> الاسم</label>
                <input class="form-control"  name="name" placeholder="عنوان التصنيف" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label"> العدد</label>
                <input class="form-control" name="count" placeholder=" العدد" />
                @error('count')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/NotifySales') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

    </x-admin-contaner>
</x-admin-layout>