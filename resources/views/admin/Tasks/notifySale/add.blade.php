@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <h3>البيانات</h3>
        </div>
        <form method="POST" action="{{ url('/admin/NotifySales/') }}">
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
                <label> العدد</label>
                <input class="form-input" name="count" placeholder=" العدد" />
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
