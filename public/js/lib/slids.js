new Swiper(".swiper-container2", {
    mousewheel: {
        invert: false,
        interval: 400,
    },
    autoplay: {
        delay: 3000,
    },
    plugins: [SwiperPluginAutoPlay],
});

new Swiper(".swiper-container3", {
    spaceBetween: 10,
    slidesPerView: 6,
    loop: true,
    autoplay: {
        delay: 2000,
    },
    plugins: [SwiperPluginAutoPlay],
});

new Swiper(".swiper-container4", {
    slidesPerView: 2,
    spaceBetween: 120,
    loop: true,
    autoplay: {
        delay: 2500,
    },

    plugins: [SwiperPluginAutoPlay],
});
