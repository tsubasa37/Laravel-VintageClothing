<x-app-layout>
    <x-slot name="header">
        <div class="flex question_header">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    質問一覧
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <main>
            <div class="wrapper">
                @foreach ($shops as $shop)
                    <a href="{{ route('user.shops.show', ['shop' => $shop->id ]) }}">
                        <div class="shadow flex shop-wrapper">
                            <div class="pc-shop-list">
                                <div class="shop-list-img js-main-img">
                                    <x-thumbnail :filename="$shop->image1" type="shops" />
                                </div>
                            </div>
                            <div class="mobile-shop-list">
                                <div class="mobile-shop-list-img">
                                    <img src="" onerror="this.style.display='none'" alt="">
                                </div>
                            </div>
                            <div class="shop-list">
                                <div class="shop-list-name">
                                    <h1>{{ $shop->name }}</h1>
                                </div>
                                <div class="shop-list-address">
                                    <p>住所：{{ $shop->prefecture }}{{ $shop->City }}{{ $shop->address }}</p>
                                </div>
                                <div class="shop-list-address">
                                    <p>{{ $shop->information }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>