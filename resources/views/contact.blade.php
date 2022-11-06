
<x-layout>



    <section class="ContactUs">
        <div >
        <h3>
            <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> العنوان 
        </h3>
            <p>{{$setting->adress}}</p>
        </div>
    
    
        <div>
            <h3>
            <i class="fa fa-phone  fa-2x" aria-hidden="true"></i> رقم الهاتف 
            </h3>
            <p>{{$setting->phone}}</p>

        </div>
    
    <div >
    <h3><i class="fa fa-envelope  fa-2x" aria-hidden="true"></i> البريد الالكتروني </h3>
                                <p> 
        <a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
    </div>
    </section>

    <x-contact></x-contact>

</x-layout>