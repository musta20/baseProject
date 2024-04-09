<x-layout>
    {{-- <services :services="$category" /> --}}
    <section class=" p-6 flex justify-center flex-col w-full">
        <span class="text-3xl mx-auto py-5 text-slate-800">خدماتنا</span>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 lg:gap-8 ">
    

            {{count($category) > 0 ? '' : 'لا يوجد خدمات'}}

            @foreach ($category as $item)
        
            <div
                class="border hover:drop-shadow-lg  flex flex-col justify-center justify-items-center text-center  border-slate-300 rounded-md p-6 bg-slate-100 ">
                <div class="text-xl  py-2 text-slate-800 font-bold">{{ $item->title }}</div>
                <div class="text-sm py-3 text-slate-800">{{$item->des}}</div>
                <a  href="{{ route('services', $item->id)}}" class="btn w-30">طلب الخدمة</a>
            </div>
    
            @endforeach

        </div>
        {{$category->links()}}
    </section>
    {{-- <section class="">
        <center>
            <h2 class="title"> الخدمات </h2>
        </center>
        <div class=" services ">
            @foreach ($category as $item)
            <div class="contentServices">
                <h3>
                    <a href="{{url('services/'.$item->id)}}">{{$item->title}}</a>
                </h3>
                <p class="">
                    {{$item->des}}
                </p>
                <center>
                    <a href="{{url('services/'.$item->id)}}" class="btn">عرض</a>
                </center>
            </div>
            @endforeach
        </div>
    </section> --}}




</x-layout>