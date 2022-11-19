<x-admin-layout>

    <div class="row">
        <div class="page-title-box">

            <h3 class="page-title">
                انشاء رسالة
            </h3>

<hr>

        </div>
    </div>

    <x-admin-contaner>

        <div class="p-1 w-75">
            <div class=" px-3 pt-3 pb-0">
                <form method="POST" action="{{ url('/admin/Messages') }}">
                    @csrf
                    <div class="mb-2">
                        <label for="msgto" class="form-label">الى</label>
                        <select class="form-control" name="to" placeholder=" الى">
                            @foreach ($Users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('to')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="mailsubject" class="form-label">عنوان الرسالة</label>
                        <input class="form-control" name="title" placeholder="عنوان الرسالة" />

                        @error('title')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="write-mdg-box mb-3">
                        <label class="form-label"> نص الرسالة</label>

                        <textarea class="form-control" name="message" placeholder=" نص الرسالة" 
                        cols="30" rows="10"></textarea>

                        @error('message')
                            <span class="helper">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="px-3 pb-3">
                        <button  type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send me-1"></i> ارسال</button>

                        <a type="button" href="{{ url('admin/inbox/1') }}" class="btn btn-light">الغاء</a>
                    </div>
            </form>
        </div>

        </div>

    </x-admin-contaner>
</x-admin-layout>
