
<x-layout>

<section dir="rtl" class=" bg-slate-800  p-6 gap-3 items-center flex flex-col h-auto">

    <form class="w-3/6 rounded-lg flex flex-col items-center py-10 bg-slate-100 p-5"     method="POST"
    action="{{ route('checkOrderStatus') }}">

    @csrf
    <div class="text-3xl mb-10 flex gap-2   ">
        الإستعلام عن حالة الطلب
       </div>
        <x-admin.input-card  type="number" id="o_code" name="code" placeholder="ادخل رقم الطلب *" />

        <hr class="my-3">
        <button class="btn w-1/6">
            استعلام
        </button>
    </form>


</section>

</x-layout>
