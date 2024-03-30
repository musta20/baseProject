<x-admin.layout>




    <div class="px-5  pt-5">
        <div class=" flex justify-between p-3 mb-3 bg-slate-100 w-full rounded-md border border-gray-300 ">
            <span class=" text-xl py-2 px-2 font-IBMPlex text-slate-600">
                <h3>اضافة وسيلة دفع</h3>
            </span>
            <a 
            href="{{ route('admin.Payment.index') }}"
            
            class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

            الغاء</a>

        </div>
        <form method="POST" class="w-full mx-auto" action="{{ route('admin.Payment.update' , $payment->id) }}" class="flex gap-2">
           
            @csrf
            @method('PUT')
            <div class=" p-3 bg-slate-100 w-full mx-auto rounded-md border border-gray-300 ">

                <div class="flex gap-3 ">
                    <x-admin.input-card name="name" value="{{ $payment->name }}" label="الاسم" />
                </div>
                <hr>
                <br>
                <button type="submit" 
                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">

                حفظ</button>
            
            </div>
           
      



     
        </form>
    </div>

</x-admin.layout>
