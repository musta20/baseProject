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
                    <label for="msgto" class="form-label">الرقم</label>
                    <div class="conversation-text">{{ $task->number }}</div>
                </div>

            </div>

            <div class=" px-3 pt-3 pb-0">
                <div class="mb-2">
                    <label class="form-label"> تاريخ الاصدار</label>
                    <div class="conversation-text">{{ $task->issueAt }}</div>
                </div>

            </div>
            <div class="px-3 pt-3 pb-0">
                <label class="form-label"> مدة الصلاحية</label>
                <div class="conversation-text">{{ $task->duration }}</div>
                <hr>
            </div>

            <div class="px-3 pt-3 pb-0">
                <label class="form-label"> تاريخ الانتهاء </label>
                <div class="conversation-text">{{ $task->exp }}</div>
            </div>
            <br>
<h3> تعديل</h3>
            <hr>
            <form  method="POST" action="{{ route('admin.postMyNotifyTask',$task->id) }}" >
                @csrf
                <div class="mb-3">
                    <label class="form-label"> تاريخ الاصدار</label>
                    <input class="form-control" type="date" name="issueAt" placeholder="  تاريخ الاصدار" />
                    @error('issueAt')
                        <span class="helper">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                <div class="mb-3">
                    <label  class="form-label">بالشهر مدة الصلاحية</label>

                    <select class="form-control" name="duration">
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






                <div class="mb-3">

                    <div class="px-3 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> حفظ</button>

                        <a type="button" href="{{ route('admin.showMyNotifyTask',1) }}" class="btn btn-light">الغاء</a>
                    </div>
                </div>



            </form>


    </x-admin-contaner>
</x-admin-layout>
