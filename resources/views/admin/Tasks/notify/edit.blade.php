@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <h3>البيانات</h3>
        </div>
        <form method="POST" action="{{ url('/admin/TasksNotify/' . $tasksNotify->id) }}">
            @csrf
            @method('PUT')
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
                <label> الرقم</label>
                <input class="form-input" value="{{ $tasksNotify->number }}" name="number" placeholder=" الايقونة" />
                @error('number')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="formLaple">
                <label> تاريخ الاصدار</label>
                <input class="form-input" type="date" value="{{ $tasksNotify->issueAt }}" name="issueAt"
                    placeholder=" الايقونة" />
                @error('issueAt')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="formLaple">
                <label>بالشهر مدة الصلاحية</label>

                <select class="form-input" name="duration">
                    <option>{{ $tasksNotify->duration }}</option>

                    @for ($i = 1; $i < 25; $i++)
                    @if ($tasksNotify->duration != $i)
                    <option>{{ $i }}</option>

                    @endif
                    @endfor

                </select>

                @error('duration')
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
