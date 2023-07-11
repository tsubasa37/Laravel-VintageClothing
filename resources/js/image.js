// // import Swiper JS
// import Swiper, { Navigation, Pagination } from 'swiper';
import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';
// import Swiper from'swiper/bundle';

// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

 // configure Swiper to use modules
// Swiper.use([Navigation, Pagination]);
Swiper.use([Navigation, Pagination, Autoplay]);

 // init Swiper:
const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
 // If we need pagination
    autoplay: {
        delay: 6000, // ４秒後に次の画像へ
        disableOnInteraction: false, // ユーザー操作後に自動再生を再開する
    },
    speed: 2000, // ２秒かけながら次の画像へ移動
    allowTouchMove: false, // マウスでのスワイプを禁止
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    // Navigation arrows
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
    el: '.swiper-scrollbar',
    },
});




$(function() {
    $('.nav-menu').hover(function() {
      $(this).children('.admin-menu-list').stop().slideToggle();
    });
  });



  