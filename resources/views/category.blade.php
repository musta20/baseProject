
<x-layout>




<section class="">
    <center>
                    <h2 class="title"  > الخدمات </h2>
                       </center>
       
            
                    <div class=" services ">

                        @foreach ($category as $item)
                            
                        
                        <div
                         class="contentServices">
                                <h3>
                                <a href="{{url('services/'.$item->id)}}">{{$item->title}}</a>
                                </h3>
                            <p class="">
                                 {{$item->des}}
                                </p>
                            <center >
                                <a href="{{url('services/'.$item->id)}}" class="btn">عرض</a>
                            </center>
                        </div>
                        
                        
                        @endforeach

                        
                    </div>
    
    
    
    
                
            </section>

</x-layout>