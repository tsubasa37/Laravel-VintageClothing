<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            お気に入り商品
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">
                    <div class="items-wrapper flex-wrap">
                        @if (count($likedProducts) > 0)
                            @foreach ($likedProducts as $likedProduct)
                                <div class="items-card">
                                    <div class="border rounded-md p-2 md:p-4">
                                        <a href="{{ route('user.items.show', ['item' => $likedProduct->id]) }}">
                                            <x-thumbnail filename="{{ $likedProduct->filename ?? '' }}" type="products" />
                                            <div class="text-gray-700 pt-2">
                                                {{ $likedProduct->name }}
                                            </div>
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                                {{ $likedProduct->category }}</h3>
                                        </a>
                                        <div class="flex items-icon">
                                            <p class="mt-1">￥{{ number_format($likedProduct->price) }}</p>
                                            @auth
                                                <button class="favorite-button mt-2 "
                                                    data-product-id="{{ $likedProduct->id }}">
                                                    @if ($likedProduct->isLikedBy(Auth::user()))
                                                        <i class="fas fa-heart liked"></i>
                                                    @else
                                                        <i class="far fa-heart"></i>
                                                    @endif
                                                </button>
                                            @endauth
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>商品がありません</p>
                        @endif
                    </div>
                </div>
                {{ $likedProducts->links() }}
            </div>
        </div>
    </div>

    @vite(['resources/js/like.js'])

    {{-- <script>
        const select = document.getElementById('sort');
        select.addEventListener('change', function() {
            this.form.submit()
        });

        const paginate = document.getElementById('pagination');
        paginate.addEventListener('change', function() {
            this.form.submit()
        });
    </script> --}}
</x-app-layout>
