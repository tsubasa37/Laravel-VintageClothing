<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            商品一覧
        </h2>
        <form action="{{ route('user.items.index') }}" method="get">
            <div class="lg:flex lg:justify-around">
                <div class="lg:flex items-center">
                    <select name="category" class="lg:mb-0 lg:mr-2">
                        <option value="0" @if (\Request::get('category') === '0') selected @endif>全て</option>
                        @foreach ($categories as $category)
                            <optgroup label="{{ $category->name }}">
                                @foreach ($category->secondary as $secondary)
                                    <option value="{{ $secondary->id }}"
                                        @if (\Request::get('category') == $secondary->id) selected @endif> {{ $secondary->name }}
                                    </option>
                                @endforeach
                        @endforeach
                    </select>
                    <div class="flex space-x-2 items-center">
                        <div>
                            <input name="keyword" class="border border-gray-500 py-2" placeholder="キーワードを入力">
                        </div>
                        <div>
                            <button
                                class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <span class="text-sm">表示順</span><br>
                        <select name="sort" class="mr-4" id="sort">
                            <option
                                value="{{ \Constant::SORT_ORDER['recommend'] }}"@if (\Request::get('sort') === \Constant::SORT_ORDER['recommend']) selected @endif>
                                おすすめ順
                            </option>
                            <option
                                value="{{ \Constant::SORT_ORDER['higherPrice'] }}"@if (\Request::get('sort') === \Constant::SORT_ORDER['higherPrice']) selected @endif>
                                料金の高い順
                            </option>
                            <option
                                value="{{ \Constant::SORT_ORDER['lowerPrice'] }}"@if (\Request::get('sort') === \Constant::SORT_ORDER['lowerPrice']) selected @endif>
                                料金の安い順
                            </option>
                            <option
                                value="{{ \Constant::SORT_ORDER['later'] }}"@if (\Request::get('sort') === \Constant::SORT_ORDER['later']) selected @endif>
                                新しい順
                            </option>
                            <option value="{{ \Constant::SORT_ORDER['older'] }}"
                                @if (\Request::get('sort') === \Constant::SORT_ORDER['older']) selected @endif>
                                古い順
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 dark:text-gray-100">
                    <div class="items-wrapper flex-wrap">
                        @if (count($products) > 0)
                            @foreach ($products as $product)
                                <div class="items-card">
                                    <div class="border rounded-md p-2 md:p-4">
                                        <a href="{{ route('user.items.show', ['item' => $product->id]) }}">
                                            <x-thumbnail filename="{{ $product->filename ?? '' }}" type="products" />
                                            <h3 class="text-gray-500 text-xs mt-2 tracking-widest title-font mb-1">
                                                {{ $product->category }}</h3>
                                        </a>
                                        <div class="flex items-icon">
                                            <p class="mt-1">￥{{ number_format($product->price) }}</p>
                                            @auth
                                                <button class="favorite-button mt-2 "
                                                    data-product-id="{{ $product->id }}">
                                                    <like :id="{{ $product->id  }}"></like>
                                                </button>
                                            @endauth
                                            @guest
                                                <a href="{{ route('user.login') }}"><i class="far fa-heart"></a></i>
                                            @endguest
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>商品がありません</p>
                        @endif
                    </div>
                </div>
                {{ $products->appends([
                        'sort' => \Request::get('sort'),
                        'pagination' => \Request::get('pagination'),
                    ])->links() }}
            </div>
        </div>
    </div>

    @vite(['resources/js/like.js'])


    <script>
        const select = document.getElementById('sort');
        select.addEventListener('change', function() {
            this.form.submit()
        });

        const paginate = document.getElementById('pagination');
        paginate.addEventListener('change', function() {
            this.form.submit()
        });
    </script>
</x-app-layout>
