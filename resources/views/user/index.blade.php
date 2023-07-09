<x-app-layout>
    <section>
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


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="merchandise">商品</h1>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap">
                            @foreach ($products as $product)
                                <div class="w-1/4 p-2 md:p-4">
                                    <a href="{{ route('user.items.show',['item' => $product->id]) }}">
                                        <div class="border rounded-md p-2 md:p-4">
                                            <x-thumbnail filename="{{$product->filename ?? ''}}" type="products" />
                                                <div class="text-gray-700 pt-2">
                                                    {{ $product->name}}
                                                </div>
                                                <div class="mt-4">
                                                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category }}</h3>
                                                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                                                    <p class="mt-1">{{ number_format($product->price)}} <span class="text-sm text-gray-700">円(税込)</span></p>
                                                </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @vite(['resources/js/image.js'])
    <script>
    </script>
</x-app-layout>