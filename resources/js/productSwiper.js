// import Swiper JS
import Swiper, { Navigation, Pagination } from 'swiper';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
 // configure Swiper to use modules
Swiper.use([Navigation, Pagination]);

 // init Swiper:
const swiper = new Swiper('.productSwiper', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: false,
 // If we need pagination
    // autoplay: {
    //     delay: 10000, // ４秒後に次の画像へ
    //     disableOnInteraction: true, // ユーザー操作後に自動再生を再開する
    // },
    pagination: {
        el: ".productSwiper-pagination",
        clickable: true,
    },

    // Navigation arrows
    navigation: {
    nextEl: '.productSwiper-button-next',
    prevEl: '.productSwiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
    el: '.productSwiper-scrollbar',
    },
    breakpoints:{
        500:{
            slidesPerView: 4,
            spaceBetween: 30,
        }
    }
});


