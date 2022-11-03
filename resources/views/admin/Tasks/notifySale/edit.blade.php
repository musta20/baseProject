@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <h3>البيانات</h3>
        </div>
        <form method="POST" action="{{ url('/admin/NotifySales/' . $tasksNotify->id) }}">
            @csrf

            @method('PUT')




            <div class="formLaple">
                <label> حالة الشراء</label>
                <select name="isDone" class="form-input" name="type">
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

            <div class="formLaple">
                <label> نوع السجل</label>
                <select class="form-input" name="type">
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
            <div class="formLaple">
                <label> الاسم</label>
                <input class="form-input" value="{{ $tasksNotify->name }}" name="name" placeholder="عنوان التصنيف" />
                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="formLaple">
                <label> العدد</label>
                <input class="form-input" value="{{ $tasksNotify->count }}" name="count" placeholder=" العدد" />
                @error('count')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div>
                <button class="btn btn-Primary">حفظ</button>

            </div>
        </form>
    </section>
@endsection
