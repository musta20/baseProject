
<x-layout>



    <section class="serviceBox" >
             
                    
    @foreach ($services as $item)
        
            <div class="Box" data-wow-duration="1s" data-wow-delay="0.2s">
                    <i class="{{$item->icon}} fa-2x" ></i>
                    <h3 class=" ">
                        <a href="{{url('order/'.$item->id)}}">
                        {{$item->name}}</a>
                    </h3>
                    <a href="{{url('order/'.$item->id)}}" class="btn">طلب</a>
            </div>
            
            @endforeach

</section>






        </x-layout>