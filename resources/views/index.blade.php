
<x-layout>
@if (!$slides->isEmpty())
<section dir="ltr" class="swiper-container2">
    <div class="swiper-wrapper swiper-wrapper2">
  @foreach ($slides as $item)
    <div class="swiper-slide swiper-slide2">
          <div class="content">
              <h3>
                  {{ $item->title }}
              </h3>
              <p>
                  {{ $item->des }}
              </p>
              <button class="btn">
                  <a class="a-btn" href="{{  $item->url }}">طلب الخدمة</a>
              </button>
          </div>
          <img src="{{  url('storage/' . $item->img) }}" alt="Notebook" />
      </div>
  @endforeach
</div>
@vite(['js/lib/index.min.js','js/lib/autoPlay.min.js','js/lib/slids.js','sadana/style/mainContact.css'])

    {{-- <link rel="stylesheet" href="{{asset('sadana/style/mainContact.css')}}" /> --}}

</section>
@endif

<section class="achivment">

 @foreach ($allNumberObjects  as $item)
 <div>
 <i class="{{ $item->img }}"></i> 
  <p class="numerGo1">
      {{ $item->number }}
  </p>
  <span>
      {{ $item->title }}
  </span>
</div>
 @endforeach

</section>

<section class="services">
    @foreach ($category as $item)
    <div class="contentServices">
{{--         <i class="fa fa-address-book" aria-hidden="true"></i>
 --}}
        <h3>
            <a href="services/{{  $item->id }}">{{  $item->title }}</a>
        </h3>
        <p class="">
            {{  $item->des; }}
        </p>
        <center>
            <a href="services/{{  $item->id }}" class="btn">عرض</a>
        </center>
    </div>
    @endforeach
</section>

<section class="requestFree">
 {{--    {{
     $setting->textcenter;
    }} --}}
</section>

<section dir="ltr" class="ourlawer">
    <div class="ourClint swiper-container4">
        <div class="swiper-wrapper">

@foreach ($clints as $item)
    
            <span class="oneCLinetRevew swiper-slide">
                <span>
                    {{  $item->name; }}
                </span>
                <span>{{  $item->des; }}</span>
                <span>
                    @php
                    $i = 1;
                    while ($i <= 5) {
                        if ($item->rate >= $i) {
                            echo "<span class='fa fa-star checkedStar'></span>";
                        } else {
                            echo "<span class='fa fa-star '></span>";
                        }
                        $i++;
                    }
                    @endphp
                </span>
            </span>
            @endforeach
        </div>
    </div>

    <p class="ourClintText">شهادات عملائنا
        {{__('NOT_ASSINED')}}


    </p>
</section>
@if(!$custmerSlide->isEmpty())

<section class="ourCustmer">
    <h3>عملاؤنا</h3>

    <p>
        نقترب من فكرك، نرى بعينك، ونتبنى توجهك لنصنع التغيير معًا ! بإتباع نهج متميز ودقيق، نسعى معًا لإحداث نقلــة غير
        مسبقة في عالم التسويق الرقمي جنبًا إلى جنب مع شركاء نجاحنا، نعتز بكم ونسعى لنتألق معكم.
    </p>

    <div dir="ltr" class="swiper-container3   maskRight">
        <div dir="ltr" class="swiper-wrapper swiper-wrapper3 ">

@foreach ($custmerSlide as $item)
    

            <a href="{{  $item->url }}" class="swiper-slide" target="_blank">
                <img width="150" src="{{ url( 'storage/' . $item->img) }}" alt="Notebook" />
            </a>


            @endforeach

        </div>

    </div>
</section>

@endif

{{-- {{ include_once 'inc/contact.php'; }}
 --}}

{{-- <script src="{{}}"></script>
<script src="{{asset('')}}"></script>
<script src="{{asset('')}}"></script> --}}


</x-layout>