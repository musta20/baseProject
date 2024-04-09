<div  class="w-2/6 overflow-hidden  mx-auto">

    <div class="swiper-container-brand ">
        <div class="swiper-wrapper ">
            <div class="swiper-slide">
                <img src="https://flowbite.com/images/logo.svg" />
            </div>

            <div class="swiper-slide">
                <img src="{{ Vite::asset('resources/logo/logo.png') }}" />
            </div>

            <div class="swiper-slide">
                <img src="{{ Vite::asset('resources/logo/brand2.png') }}" />
            </div>

            <div class="swiper-slide">
                <img src="{{ Vite::asset('resources/logo/logo.png') }}" />
            </div>



            <div class="swiper-slide">
                <img src=" https://tiny-swiper.js.org/img/logo.svg" />
            </div>

            <div class="swiper-slide">
                <img src="{{ Vite::asset('resources/logo/brand2.png') }}" />
            </div>


            <div class="swiper-slide">
                <img src=" https://tiny-swiper.js.org/img/logo.svg" />
            </div>
           
        </div>
        <div class="swiper-plugin-pagination"></div>
    </div>



    <script src="https://unpkg.com/tiny-swiper@latest/lib/index.min.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/modules/pagination.min.js"></script>
    <script src="https://unpkg.com/tiny-swiper@latest/lib/modules/autoPlay.min.js"></script>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/slide.css') }}" />
    <!-- Initialize Tiny-Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container-brand", {
            slidesPerView:5,
            spaceBetween:20,
            loop:true,
        autoplay: {
            delay: 5000
            },
   
          
          plugins: [SwiperPluginAutoPlay]
        });
    </script>
</div>