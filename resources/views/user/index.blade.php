<x-app-layout>
    <section>
    <div class="p-swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="./images/shop01.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./images/shop02.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="./images/shop03.jpg" alt="">
            </div>
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>
        <!-- navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="scrolldown4"><span>Scroll</span></div>
    </div>
    <!-- 検索ボックス -->

        <div class="search">
            <form action="{{ route('user.shops.index') }}" method="get" class="search">
                <div class=" shop__search">
                    <div class="flex shop__search__area">
                        <input name="Area" type="text" placeholder="エリア(例)東京">
                    </div>
                    <div class="flex search__store">
                        <input name="storeName" type="text" placeholder="店舗名">
                    </div>
                    <div class="flex search_container">
                        <input type="submit" value="検索">
                        <input type="hidden" name="type" value="search">
                    </div>
                </div>
            </form>
        </div>
    </section>
    @vite(['resources/js/image.js'])
    <script>
    </script>
</x-app-layout>