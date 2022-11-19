<x-admin-layout>
    <br>
    <div class="row">
        <h3 class="page-title-box">
            تفاصيل التنبيه
        </h3>
    </div>
    <hr>
    <x-admin-contaner>
        <div class="p-1 w-75">
            <div class=" px-3 pt-3 pb-0">
                <div class="mb-2">
                    <label for="msgto" class="form-label">الاسم</label>
                    <div class="conversation-text">{{ $task->name }}</div>
                </div>

            </div>
            <div class=" px-3 pt-3 pb-0">
                <div class="mb-2">
                    <label for="msgto" class="form-label">العدد</label>
                    <div class="conversation-text">{{ $task->count }}</div>
                </div>

            </div>

            <div class=" px-3 pt-3 pb-0">
                <div class="mb-2">
                    <label class="form-label"> الحالة </label>
                    <div class="conversation-text">


                        @switch($task->isDone)
                            @case(0)
                                لم يتم الشراء بعد
                            @break

                            @case(1)
                                تم الشراء
                            @break
                        @endswitch
                    </div>
                </div>

            </div>



            <br>
            <h3> تعديل</h3>
            <hr>
            <form method="POST" action="{{ url('admin/postmysale/' . $task->id) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label"> حالة الشراء</label>
                    <select name="isDone" class="form-select select2 select2-hidden-accessible" >
                        @switch($task->isDone)
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
                    @error('isDone')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ url('admin/showmysale/'.$task->type) }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>



            </form>


    </x-admin-contaner>
</x-admin-layout>
