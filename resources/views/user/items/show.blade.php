<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            商品の詳細
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-gray-700 pt-2">
                        <div class="md:flex md:justify-around">
                            <div class="md:w-1/2">
                                <div class="swiper">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            @if(isset($product->image1))
                                                <img src="{{ asset('storage/products/' .  $product->image1 )}}">
                                            @else
                                                <img src="/images/Noimage2.png ">
                                            @endif
                                        </div>
                                        <div class="swiper-slide">
                                            @if(isset($product->image2))
                                            <img src="{{ asset('storage/products/' .  $product->image2 )}}">
                                            @else
                                                <img src="/images/Noimage2.png ">
                                            @endif
                                        </div>
                                        <div class="swiper-slide">
                                            @if(isset($product->image3))
                                            <img src="{{ asset('storage/products/' .  $product->image3 )}}">
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
                            <div class="md:w-1/2 ml-5">
                                <a href="{{ route('user.shops.show',['shop' => $product->shop->id ]) }}">
                                    <div class="md-4 flex shop-link-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                        </svg>
                                        <p>{{ $product->shop->name }}</p>
                                    </div>
                                </a>
                                <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}</h2>
                                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product ->name }}</h1>
                                <p class="leading-relaxed">{{ $product->information }}</p>
                                <form method="post" action="{{ route('user.cart.add')}}">
                                    @csrf
                                    <div class="flex justify-end mt-10 items-center pb-5 border-b-2 border-gray-100 mb-5">
                                        <div class="flex ml-6 items-center">
                                            <span class="mr-3 ">数量</span>
                                            <div class="relative">
                                                <select name="quantity" class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                                    @for($i = 1; $i <= $quantity; $i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price)}} <span class="text-sm text-gray-700">円(税込)</span></span>
                                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">カートに入れる</button>
                                        <input type="hidden" name="product_id" value="{{ $product->id}}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <script src="./js/swiper.js"></script> --}}
    @vite(['resources/js/swiper.js'])

</x-app-layout>
