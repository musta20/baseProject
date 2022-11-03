@extends('admin.layout.index')
@section('content')
    <section class="list border">
        <div class="controller">
            <x-card-message></x-card-message>

            <h3>اسناد مهمة</h3>
        </div>
        <form method="POST" action="{{ url('/admin/EditTask/'.$task->id) }}">
            @csrf
            <table>
                <tr>
                    <th>عنوان المهمة</th>
                    <td>{{ $task->title }}</td>
                </tr>
                <tr>
                    <th>حالة المهمة </th>
                    <td>
                        @switch($task->isdone)
                            @case(0)
                                لم يستلم المعهمة بعد
                            @break

                            @case(1)
                                بداء العمل عليها
                            @break

                            @case(2)
                                انجز جزئي للمهمة
                            @break

                            @case(3)
                                تم الانجاز
                            @break

                            @case(5)
                                ملغية
                            @break
                            @default
                        @endswitch
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>وصف المهمة</th>
                    <td>{{ $task->des }}</td>
                </tr>
                <tr>
                    <th> الملفات المرفقة</th>
                    <td>{{ $task->des }}</td>
                </tr>
                <tr>
                    <th> تاريخ بداء المهمة</th>
                    <td>{{ $task->start }}</td>
                </tr>
                <tr>
                    <th> تاريخ انتهاء المهمة</th>
                    <td>{{ $task->end }}</td>
                </tr>
                <tr>
                    <th> المرفقات</th>
                    <td>
                        @if (!count($files))
                            لايوجد مرفقات
                        @endif
                        @foreach ($files as $key=> $item)
                        <br>
                            <a target="_blank" href="{{ url('/storage/' . $item->name) }}">
                               ملف {{$key}}
                                </a>
                        @endforeach
                    </td>
                </tr>
            </table>


            <div class="formLaple">
                <label> تعديل حالة المهمة </label>
                <select name="status" class="form-input">
                    @switch($task->isdone)
                        @case(0)
                            <option value="0">لم يستلم المعهمة بعد</option>
                            <option value="1">بداء العمل عليها</option>
                            <option value="2"> انجز جزئي للمهمة</option>
                        @break

                        @case(1)
                            <option value="1">بداء العمل عليها</option>
                            <option value="0">لم يستلم المعهمة بعد</option>
                            <option value="2"> انجز جزئي للمهمة</option>
                            <option value="3"> تم الانجاز</option>
                        @break

                        @case(2)
                            <option value="2"> انجز جزئي للمهمة</option>
                            <option value="1">بداء العمل عليها</option>
                            <option value="0">لم يستلم المعهمة بعد</option>
                            <option value="3"> تم الانجاز</option>
                        @break

                        @case(3)
                            <option value="3"> تم الانجاز</option>
                            <option value="2"> انجز جزئي للمهمة</option>
                            <option value="1">بداء العمل عليها</option>
                            <option value="0">لم يستلم المعهمة بعد</option>
                        @break

                        @default
                    @endswitch


                </select>

                @error('user_id')
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
