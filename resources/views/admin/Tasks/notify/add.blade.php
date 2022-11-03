@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <h3>البيانات</h3>
        </div>
        <form method="POST" action="{{ url('/admin/TasksNotify/') }}">
            @csrf

            <div class="formLaple">
                <label> نوع السجل</label>

                <select class="form-input"  name="type">

                    @foreach ($types as $item)
                        <option value={{$item->id}} >{{$item->name}}</option>
                    @endforeach

                </select>

                @error('type')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>            
            <div class="formLaple" >
                <label>الى الموظف : </label>
                <select name="user_id" class="form-input">
                    @foreach ($users as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
        
                @error('user_id')
                <span class="helper">
                {{$message}}
                </span>
                @enderror
            </div>
            <div class="formLaple">
                <label> الاسم</label>
                <input class="form-input"  name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="formLaple">
                <label> الرقم</label>
                <input class="form-input" name="number" placeholder=" الايقونة" />
                @error('number')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="formLaple">
                <label> تاريخ الاصدار</label>
                <input class="form-input" type="date"
                 
                 name="issueAt"
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
                    @for ($i = 1; $i < 25; $i++)
                        <option>{{ $i }}</option>
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
