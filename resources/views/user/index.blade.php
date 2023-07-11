<x-app-layout>

        <div class="p-swiper-container">
            <div class="swiper">
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

        <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                        <h2 class="modal__title" id="modal-1-title">
                            説明
                        </h2>
                        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                        <p>
                            テキストを入力する際、タグを使用することでデザインできます。<br>タグでテキストを囲むと囲んだ場所だけ反映されます。
                        </p>
                    </main>
                    <footer class="modal__footer">
                        <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
                    </footer>
                </div>
            </div>
        </div>
        <div class="p-2 w-1/2 mx-auto text-end">
            <a class="text-white bg-blue-500 border-0 py-2 px-2 focus:outline-none hover:bg-blue-600 rounded" data-micromodal-trigger="modal-1" href='javascript:;'>タグの使用方法</a>
        </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="merchandise">お気に入り一覧</h1>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="productSwiper">
                            <div class="swiper-wrapper">
                                @if(count($likedProducts) > 0)
                                    @foreach ($likedProducts as $likedProduct)
                                        <div class="swiper-slide">
                                            <div class="border rounded-md p-2 md:p-4">
                                                <a href="{{ route('user.items.show',['item' => $likedProduct->id]) }}">
                                                    <x-thumbnail filename="{{$likedProduct->filename ?? ''}}" type="products" />
                                                    <div class="text-gray-700 pt-2">
                                                        {{ $likedProduct->name}}
                                                    </div>
                                                    <div class="mt-4">
                                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $likedProduct->category }}</h3>
                                                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $likedProduct->name }}</h2>
                                                        <p class="mt-1">{{ number_format($likedProduct->price)}} <span class="text-sm text-gray-700">円(税込)</span></p>
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


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="merchandise">商品</h1>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="productSwiper">
                            <div class="swiper-wrapper">
                                @if(count($products) > 0)
                                    @foreach ($products as $product)
                                        <div class="swiper-slide">
                                            <div class="border rounded-md p-2 md:p-4">
                                                <a href="{{ route('user.items.show',['item' => $product->id]) }}">
                                                    <x-thumbnail filename="{{$product->filename ?? ''}}" type="products" />
                                                    <div class="text-gray-700 pt-2">
                                                        {{ $product->name}}
                                                    </div>
                                                    <div class="mt-4">
                                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category }}</h3>
                                                        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                                        <p class="mt-1">{{ number_format($product->price)}} <span class="text-sm text-gray-700">円(税込)</span></p>
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

</x-app-layout>