<x-layout>

    <form method="POST" class="colorTexetFooter" action="{{ route('saveJobs') }}" enctype="multipart/form-data">

        @csrf

    <section dir="rtl" class="py-10 mx-auto w-4/6 h-auto ">
        <h2 class="text-3xl text-gray-700">ارسل طلب توظيف</h2>
        <hr class="my-5  border-slate-400">
        <div class="mb-5 flex gap-2">
            <x-admin.input-card name="name" label="الاسم كامل" placeholder="الاسم كامل" />
            <x-admin.input-card name="email" label="البريد الالكتروني" placeholder="ex: 0lO6f@example.com" />
        </div>

        <div class="mb-5 flex gap-2">
            <x-admin.select-input :options="App\Enums\CertsNames::cases()" name="cert" label="الشهادة" />
            <x-admin.input-card name="phone" type="number" label="رقم  الجوال" placeholder="+966 50 000 0000" />
        </div>

        <div class="mb-5 flex gap-2">
            <x-admin.input-card name="exp" label="عدد سنوات الخبرة" placeholder="عدد سنوات الخبرة - اكتب صفر في حالة عدم وجود خبرة" />
            <x-admin.input-card name="majer" placeholder="التخصص" label="التخصص الدراسي" />
        </div>

        <x-admin.textarea-card name="exp_des" placeholder="الخبرة  - اكتب لايوجد في حالة عدم وجود خبرة" cols="30" rows="5" label="الخبرة" />
        <div class="mb-5 flex gap-2">
            <x-admin.select-input name="job_id" :options="$jobs" label="الوظيفة المرغوبة " />
            <x-admin.select-input name="city" :options="App\Enums\City::cases()" label="مدينة الاقامة " />
        </div>

        <div class="flex gap-5 p-3">
            <x-admin.select-input name="Jobcity" :options="$jobcity" label="مدينة الوظيفة" />
        </div>

        <x-admin.textarea-card name="about" placeholder="التفاصيل" cols="30" rows="5" label="تحدث عن نفسك" />


        <div class="flex gap-5 p-3">
            <x-admin.select-input name="Jobcity" :options="$jobcity" label="مدينة الوظيفة" />
            <x-admin.input-card name="cv" type="file" label="اضف السيرة الذاتية" />
        </div>

<button class="btn" >ارسل الطلب</button>
<hr class="my-5  border-slate-400" >

    </section>

    </form>



</x-layout>