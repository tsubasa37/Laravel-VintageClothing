<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            店舗一覧
        </h2>
        <form action="{{ route('user.shops.index') }}" method="get">
            <div class="lg:flex lg:justify-end">
                <div class="lg:flex items-center">
                    <div class="space-x-2 items-center shop-search-list">
                        <x-selectPrefecture/>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <div class="py-12">
        <main>
            <div class="wrapper">
                @if(count($shops) > 0)
                    @foreach ($shops as $shop)
                        <a href="{{ route('user.shops.show', ['shop' => $shop->id ]) }}">
                            <div class="shadow shop-wrapper">
                                <div class="pc-shop-list">
                                    <div class="shop-list-img js-main-img">
                                        <x-thumbnail :filename="$shop->image1" type="shops" />
                                    </div>
                                </div>
                                {{-- <div class="mobile-shop-list">
                                    <div class="mobile-shop-list-img">
                                        <img src="" onerror="this.style.display='none'" alt="">
                                    </div>
                                </div> --}}
                                <div class="shop-list">
                                    <div class="shop-list-name">
                                        <h1>{{ $shop->name }}</h1>
                                    </div>
                                    <div class="shop-list-address">
                                        <p>住所：{{ $shop->prefecture }}{{ $shop->City }}{{ $shop->address }}</p>
                                    </div>
                                    <div class=" shopCategoryArea">
                                        @foreach ($shop->shopCategory as $category)
                                            <div class="shop-list-category">
                                                <p>{{ $category->name }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <p class="p-20 text-xl">該当するお店がありません</p>
                </div>
                @endif
            </div>
        </main>
    </div>
</x-app-layout>