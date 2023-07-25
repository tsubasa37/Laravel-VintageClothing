<x-app-layout>
    <x-slot name="header">
        <div class="question_header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $shop->name }}
            </h2>
            <div class="shop-station-category">
                <p>ジャンル<br>
                    @foreach ($shopCategories as $shopCategory)
                        <span class="border p-1">{{ $shopCategory->name }}</span>
                    @endforeach
                </p>
            </div>
        </div>
    </x-slot>

    <div class="shop-disp">

        <div class="shop-detail-img">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        @if (isset($shop->image1))
                            <img src="{{ asset('storage/shops/' . $shop->image1) }}">
                        @else
                            <img src="/images/Noimage2.png ">
                        @endif
                    </div>
                    <div class="swiper-slide">
                        @if (isset($shop->image2))
                            <img src="{{ asset('storage/shops/' . $shop->image2) }}">
                        @else
                            <img src="/images/Noimage2.png ">
                        @endif
                    </div>
                    <div class="swiper-slide">
                        @if (isset($shop->image3))
                            <img src="{{ asset('storage/shops/' . $shop->image3) }}">
                        @else
                            <img src="/images/Noimage2.png ">
                        @endif
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
            </div>
        </div>

        <ul id="tab_menu">
            <li id="tab1"><a href="#tab01">店舗情報</a></li>
            <li id="tab2"><a href="#tab02">商品一覧</a></li>
        </ul>
        <div class="tab_panel">
            <div class="shop-information">
                <div class="pr-comment">
                    <p>{!! $shop->information !!}</p>
                </div>
            </div>
            <table class="rst-data-table">
                <tbody>
                    <tr>
                        <th>店名</th>
                        <td>{{ $shop->name }}</td>
                    </tr>
                    <tr>
                        <th>TEL</th>
                        <td>{{ $shop->phone }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $shop->prefecture }}{{ $shop->City }}{{ $shop->address }}</td>
                    </tr>
                    <tr>
                        <th>営業時間</th>
                        <td>{{ $shop->businessHours }}</td>
                    </tr>
                    <tr>
                        <th>定休日</th>
                        <td>{{ $shop->regularHoliday }}</td>
                    </tr>
                    <tr>
                        <th>ホームページ</th>
                        <td>{{ $shop->home_page }}</td>
                    </tr>
                    <tr>
                        <th class="SNSLogo"><img src="/images/Twitter.png" alt=""></th>
                        <td>{{ $shop->twitter }}</td>
                    </tr>
                    <tr>
                        <th class="SNSLogo"><img src="/images/instagram.jpg" alt=""></th>
                        <td>{{ $shop->Instagram }}</td>
                    </tr>
                    <tr>
                        <th class="SNSLogo"><img src="/images/Facebook.png" alt=""></th>
                        <td>{{ $shop->Facebook }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab_panel">
            <div class="py-12">
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="flex flex-wrap">
                                @if (count($shop->product) > 0)
                                    @foreach ($shop->product as $product)
                                        <div class=" p-2  md:p-4 shop-disp-product">
                                            <a href="{{ route('user.items.show', ['item' => $product->id]) }}">
                                                <div class="border rounded-md p-2 md:p-4">
                                                    <x-thumbnail filename="{{ $product->image1 ?? '' }}" type="products" />
                                                    <div class="text-gray-700 pt-2">
                                                        {{-- {{ $product->name}} --}}
                                                    </div>
                                                    <div class="mt-4">
                                                        <p class="mt-1">￥{{ number_format($product->price) }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="shop-disp-noItems">
                                        <p>商品がありません</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/swiper.js'])
    @vite(['resources/js/tab.js'])
    @vite(['resources/js/Noimage.js'])

</x-app-layout>
