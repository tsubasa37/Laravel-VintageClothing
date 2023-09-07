<x-app-layout>

    <div class="p-swiper-container">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./images/AIshop2.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./images/AIshop1.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./images/AIshop3.png" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="./images/AIshop4.png" alt="">
                </div>
            </div>
            <!-- pagination -->
            <div class="swiper-pagination"></div>
            <!-- navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="scrolldown4" id="page-link"><a href="#area-1"><span>Scroll</span></a></div>
        </div>
    </div>
    <!-- 検索ボックス -->


    <div class="search" id="area-1">
        <form action="{{ route('user.shops.index') }}" method="get" class="search">
            {{-- <div class="shop__search">
                <div class="flex search__store">
                    <input name="storeName" type="text" placeholder="店舗名">
                </div>
                <div class="flex search_container">
                    <input type="submit" value="検索">
                    <input type="hidden" name="type" value="search">
                </div>
            </div> --}}
            <div class="container ">
                <div class="search__store royalblue">
                    <input type="text" name="storeName" placeholder="店舗名">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    <input type="hidden" name="type" value="search">
                </div>
            </div>

            <x-prefectures-list />
        </form>
    </div>
    @auth
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 merchandise">
                <a href={{ route('user.items.favorite') }}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path class="merchandise-icon" stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <h1 class="merchandise-txt">お気に入り一覧</h1>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="productSwiper">
                            <div class="swiper-wrapper">
                                @if (count($likedProducts) > 0)
                                    @foreach ($likedProducts as $likedProduct)
                                        <div class="swiper-slide">
                                            <div class="border test rounded-md p-2 md:p-4">
                                                <a href="{{ route('user.items.show', ['item' => $likedProduct->id]) }}">
                                                    <x-thumbnail filename="{{ $likedProduct->filename ?? '' }}"
                                                        type="products" />
                                                    <div class="mt-4">
                                                        <p class="mt-1">￥{{ number_format($likedProduct->price) }}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>お気に入り商品はありません</p>
                                @endif
                            </div>
                            <!-- If we need pagination -->
                            <div class="productSwiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="productSwiper-button-prev"></div>
                            <div class="productSwiper-button-next"></div>
                            {{-- <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 merchandise">
            <a href={{ route('user.items.index') }}>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path class="merchandise-icon" stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
            <h1 class="merchandise-txt">商品</h1>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="productSwiper">
                        <div class="swiper-wrapper">
                            @if (count($products) > 0)
                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div class="border product-w rounded-md p-2 md:p-4">
                                            <a href="{{ route('user.items.show', ['item' => $product->id]) }}">
                                                <x-thumbnail filename="{{ $product->filename ?? '' }}"
                                                    type="products" />
                                                <div class="mt-4">
                                                    <p class="mt-1">￥{{ number_format($product->price) }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>商品はありません</p>
                            @endif
                        </div>
                        <!-- If we need pagination -->
                        <div class="productSwiper-pagination"></div>

                        <!-- If we need navigation buttons -->
                        <div class="productSwiper-button-prev"></div>
                        <div class="productSwiper-button-next"></div>
                        {{-- <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/image.js'])
    @vite(['resources/js/productSwiper.js'])
    @vite(['resources/js/prefectureModal.js'])

    <script>
        $('#page-link a[href*="#"]').click(function () {
            var elmHash = $(this).attr('href');
            var pos = $(elmHash).offset().top-70;
            $('body,html').animate({scrollTop: pos}, 500);
            return false;
        });
    </script>


</x-app-layout>
