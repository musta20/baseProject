<x-admin-layout>
    <h3> تعديل بيانات المبيعات</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>

        <form method="POST" action="{{ url('/admin/NotifySales/' . $tasksNotify->id) }}">
            @csrf

            @method('PUT')




            <div class="mb-3">
                <label class="form-label"> حالة الشراء</label>
                <select name="isDone"class="form-control" name="type">
                    @switch($tasksNotify->isDone)
                        @case(0)
                            <option value="0">لم يتم الشراء بعد</option>
                            <option value="1"> تم الشراء </option>
                        @break

                        @case(1)
                            <option value="1"> تم الشراء </option>
                            <option value="0">لم يتم الشراء بعد</option>
                        @break

                        @default
                            <option value="0">لم يتم الشراء بعد</option>
                            <option value="1"> تم الشراء </option>
                        @break
                    @endswitch
                </select>
                @error('type')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label"> نوع السجل</label>
                <select class="form-control" name="type">
                    <option value={{ $tasksNotify->id }}>{{ $tasksNotify->name }}</option>
                    @foreach ($types as $item)
                        @if ($tasksNotify->id != $item->id)
                            <option value={{ $item->id }}>{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label"> الاسم</label>
                <input class="form-control" value="{{ $tasksNotify->name }}" name="name" placeholder="عنوان التصنيف" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label"> العدد</label>
                <input class="form-control" value="{{ $tasksNotify->count }}" name="count" placeholder=" العدد" />
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
