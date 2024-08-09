@props(['slides'])
<div class="">

    <div class="swiper-container ">
        <div class="swiper-wrapper ">

            @foreach ($slides as $item)
            <div class="swiper-slide ">
                <img style="-webkit-filter: brightness(50%) saturate(150%); filter: brightness(50%) saturate(150%);"
                    src="{{ asset('storage/'.    $item->img ) }}" />
                <div class="absolute text-slate-200 flex flex-col justify-center items-center   gap-4 py-20">

                    <h3 class="text-3xl"> {{ $item->title }} </h3>
                    <h1 class="text-xl"> {{ $item->des }} </h1>
                    <a href="{{ $item->url }}" class="btn w-1/2 text-center">طلب الخدمة</a>


                </div>
            </div>
            @endforeach



        </div>
        <div class="swiper-plugin-pagination"></div>
    </div>



    <script src="https://unpkg.com/tiny-swiper@latest/lib/index.min.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/modules/pagination.min.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/modules/autoPlay.min.js"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/slide.css') }}" />

    <script>
        var swiper = new Swiper(".swiper-container", {
          pagination: {
            el: ".swiper-plugin-pagination",
            clickable: true,
            bulletClass: "swiper-plugin-pagination__item",
            bulletActiveClass: "is-active"
        },
        autoplay: {
            delay: 5000
            },


          plugins: [SwiperPluginPagination,SwiperPluginAutoPlay]
        });
    </script>
</div>