<x-admin-layout>

    <h3>تعديل الخدمة</h3>

    <hr>
    <x-admin-contaner>

        <x-card-message></x-card-message>


        <form method="POST" class="w-75" action="{{ url('/admin/Services/' . $services->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">عنوان الخدمة</label>
                <input class="form-control" value="{{ $services->name }}" name="name" placeholder="عنوان التصنيف" />

                @error('name')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label class="form-label"> التصنيف</label>
                <select class="form-select select2 select2-hidden-accessible" name="cat_id">
                    <option value="{{ $catmy->id }}">{{ $catmy->title }}</option>

                    @foreach ($cat as $item)
                        @if ($item->id != $services->cat_id)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endif
                    @endforeach
                </select>
                @error('cat_id')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <label  class="form-label"> الايقونة</label>
                <input class="form-control" value="{{ $services->icon }}" name="icon" placeholder=" الايقونة" />
                @error('icon')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


            <span class="btn btn-success p-1" onclick="addFile()">إضافة ملف</span>
            <div id="files">

                @foreach ($filesInput as $key => $item)
                    <div class='mb-1 input-group w-25'>

                        <input class='form-control' value="{{ $item->name }}" name='files[]'
                            placeholder='اسم الملف' />
                            <span onclick="remitem(this)" class="btn btn-danger">حذف</span>
                    </div>
                @endforeach


                @error('files')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>




            <div class="mb-3 border p-1">

            <label class="form-lable"> طرق التوصيل</label>
                <select class="form-select select2 select2-hidden-accessible  " id="devValue">
                    @foreach ($dev as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <span class="btn btn-success p-1" onclick="addDev()"> اضافة </span>

            <div id="dev">
                @foreach ($delv as $key => $item)


                <div class="mb-1 input-group w-25"><span class="form-control">{{ $item->dev->name }}</span>
                    <input hidden="" value="{{ $item->dev->id }}" name="devs[]">
                    <span onclick="remitem(this)" class="btn btn-danger">حذف</span></div>
          
                @endforeach
                @error('dev')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            </div>



            <div class="mb-3 border p-1">

                <label class="form-lable"> طرق الدفع</label>

                <select class="form-select select2 select2-hidden-accessible  " id="paymentValue">

                    @foreach ($pym as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>

            <span class="btn btn-success p-1" onclick="addpyment()"> اضافة</span>
            <div id="payment">

                @foreach ($pay as $key => $item)
                <div class="mb-1 input-group w-25">
                    <span class="form-control">{{ $item->pym->name }}</span>
                    <input hidden="" value="{{$item->pym->id}}" name="pys[]">
                    <span onclick="remitem(this)" class="btn btn-danger">حذف</span>
                </div>


                @endforeach


                @error('files')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror
            </div>























            <div class="mb-3">
                <label class="form-label"> السعر</label>
                <input class="form-control" name="price" placeholder=" السعر" cols="30" rows="10"
                    value="{{ $services->price }}" />


                @error('price')
                    <span class="helper">
                        {{ $message }}
                    </span>
                @enderror

            </div>


                <div class="mb-3">

                <div class="px-3 pb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="mdi mdi-send me-1"></i> حفظ</button>

                    <a type="button" href="{{ url('admin/Services') }}" class="btn btn-light">الغاء</a>
                </div>
            </div>
        </form>

        <script>
            function addDev() {
                let file = document.getElementById('dev');
                let div = document.createElement("div")
                let fileV = document.getElementById('devValue');


                div.innerHTML = "<div class='mb-1 input-group w-25'><span class='form-control'>" + fileV.options[fileV.selectedIndex].text + "</span><input hidden  value='" + fileV.value + "'  name='devs[]' /><span onclick='remitem(this)' class='btn btn-danger'>حذف</span></div>";
                file.append(div);



            }




            function addpyment() {
                let file = document.getElementById('payment');
                let fileV = document.getElementById('paymentValue');
                let div = document.createElement("div")
                div.innerHTML = "<div class='mb-1 input-group w-25'><span class='form-control'>" + fileV.options[fileV .selectedIndex].text + "</span><input hidden   value='" + fileV.value +  "'  name='pys[]' /><span onclick='remitem(this)' class='btn btn-danger'>حذف</span></div>";
                file.append(div);

            }

            function addFile() {
                let file = document.getElementById('files');
                let div = document.createElement("div")
                div.innerHTML =  "<div class='mb-1 input-group w-25'><input class='form-control' name='files[]' placeholder='اسم الملف' /><span onclick='remitem(this)' class='btn btn-danger'>حذف</span></div>";
                file.append(div);  }

            function remitem(id) {
                id.parentElement.remove();

            }
        </script>




    </x-admin-contaner>
</x-admin-layout>
