<x-admin-layout>
    <h3> تعديل بيانات السجل</h3>
    <hr>
    <x-admin-contaner>
        <x-card-message></x-card-message>


        <form method="POST" action="{{ url('/admin/TasksNotify/' . $tasksNotify->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label  class="form-label"> الاسم</label>
                <input  class="form-control"  value="{{ $tasksNotify->name }}" name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label  class="form-label"> الرقم</label>
                <input  class="form-control"  value="{{ $tasksNotify->number }}" name="number" placeholder=" الايقونة" />
                @error('number')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">
                <label class="form-label"> تاريخ الاصدار</label>
                <input class="form-control"  type="date" value="{{ $tasksNotify->issueAt }}" name="issueAt"
                    placeholder=" الايقونة" />
                @error('issueAt')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <div class="mb-3">
                <label class="form-label">بالشهر مدة الصلاحية</label>
                <select class="form-control" name="duration">
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


            <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/TasksNotify') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>

        </form>
    </x-admin-contaner>
</x-admin-layout>
