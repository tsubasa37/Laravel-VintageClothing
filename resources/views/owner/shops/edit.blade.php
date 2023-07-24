<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('owner.shops.update',['shop' => $shop->id]) }}" class="edit-area" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="-m-2">
                            <div class="p-2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">店名※<span class="text-red-600">必須</span></label>
                                    <input type="text" id="name" name="name" value="{{old('name', $shop->name)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                    @error('name')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
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
                            <div class="p-2 text-end">
                                <a class="text-white bg-blue-500 border-0 py-2 px-2 focus:outline-none hover:bg-blue-600 rounded" data-micromodal-trigger="modal-1" href='javascript:;'>タグの使用方法</a>
                            </div>
                            <div class="p-2" id="edit">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">店舗情報※<span class="text-red-600">必須</span></label>
                                    <div class="tag">
                                        <ul>
                                            <!-- 装飾タグ -->
                                            <li id="hoge1" class="insertString" data-before="<b>" data-after="</b>">太字</li>
                                            <li class="insertString" data-before="<span class='red'>" data-after="</span>">赤字</li>
                                            <li class="insertString" data-before="<span class='blue'>" data-after="</span>">青字</li>
                                            <li class="insertString" data-before="<span class='yellow'>" data-after="</span>">黄字</li>
                                            <li class="insertString" data-before="<span class='big'>" data-after="</span>">大文字</li>
                                            <li class="insertString" data-before="<u>" data-after="</u>">下線</li>
                                            <li class="insertString" data-before="<br>" data-after="">改行</li>
                                        </ul>
                                    </div>
                                    <textarea id="information" name="information"  rows="10" required placeholder="店舗情報を入力してください" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('information',$shop->information)}}</textarea>
                                    @error('information')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <div class="flex">
                                        <div class="m-2">
                                            <x-thumbnail :filename="$shop->image1" type="shops" />
                                        </div>
                                        <div class="m-2">
                                            <x-thumbnail :filename="$shop->image2" type="shops" />
                                        </div>
                                        <div class="m-2">
                                            <x-thumbnail :filename="$shop->image3" type="shops" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                    <div>
                                        <input type="file" id="image" name="image1" accept=“image/png,image/jpeg,image/jpg” class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div>
                                        <input type="file" id="image2" name="image2" accept=“image/png,image/jpeg,image/jpg” class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div>
                                        <input type="file" id="image3" name="image3" accept=“image/png,image/jpeg,image/jpg” class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 m-10">
                                <label class="block text-sm font-medium mb-2">店舗カテゴリー</label>
                                <select id="js-pulldown" class="w-full" name="shopCategories[]" multiple="multiple">
                                    @foreach ($shopCategories as $shopCategory)
                                        <option value="{{ $shopCategory->id}}" @if(in_array($shopCategory->id, old('shopCategories', $shop->shopCategory->pluck('id')->all()))) selected @endif>{{ $shopCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="station" class="leading-7 text-sm text-gray-600">最寄り駅</label>
                                    <input type="text" id="station" name="station"  value="{{old('station',$shop->station)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="phone" class="leading-7 text-sm text-gray-600">TEL※<span class="text-red-600">必須</span></label>
                                    <input type="text" id="phone" name="phone" required value="{{old('phone',$shop->phone)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('phone')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="name" class="leading-7 text-sm text-gray-600">住所※<span class="text-red-600">必須</span></label>
                                <div class="relative">
                                    <label for="prefecture" class="leading-7 text-sm text-gray-600">都道府県</label>
                                    <input type="text" id="prefecture" name="prefecture" required value="{{old('prefecture', $shop->prefecture)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('prefecture')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="City" class="leading-7 text-sm text-gray-600">市・区・郡</label>
                                    <input type="text" id="City" name="City" required value="{{old('City', $shop->City)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('City')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="address" class="leading-7 text-sm text-gray-600">町域・番地・建物名など</label>
                                        <input type="text" id="address" required  name="address" value="{{old('address', $shop->address)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @error('address')
                                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="businessHours" class="leading-7 text-sm text-gray-600">営業時間※<span class="text-red-600">必須</span></label>
                                    <input type="text" id="businessHours" required name="businessHours" value="{{old('businessHours',$shop->businessHours)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('businessHours')
                                        <div class="text-sm text-red-600 dark:text-red-400 space-y-1'">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="regularHoliday" class="leading-7 text-sm text-gray-600">定休日</label>
                                    <input type="text" id="regularHoliday" name="regularHoliday" value="{{old('regularHoliday', $shop->regularHoliday)}}"  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="home_page" class="leading-7 text-sm text-gray-600">ホームページ</label>
                                    <input type="url" id="home_page" name="home_page" value="{{old('home_page',$shop->home_page)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="twitter" class="leading-7 text-sm text-gray-600">twitter</label>
                                    <input type="url" id="twitter" name="twitter" value="{{old('twitter', $shop->twitter)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="Instagram" class="leading-7 text-sm text-gray-600">Instagram</label>
                                    <input type="url" id="Instagram" name="Instagram" value="{{old('Instagram', $shop->Instagram)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative">
                                    <label for="Facebook" class="leading-7 text-sm text-gray-600">Facebook</label>
                                    <input type="url" id="Facebook" name="Facebook" value="{{old('Facebook', $shop->Facebook)}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">

                                </div>
                            </div>
                            <div class="p-2">
                                <div class="relative flex justify-around">
                                    <div>
                                        <input type="radio" name="is_selling" value="1" class="mr-2" @if($shop->is_selling === 1){ checked } @endif >販売中
                                    </div>
                                    <div>
                                        <input type="radio" name="is_selling" value="0" class="mr-2" @if($shop->is_selling === 0){ checked } @endif >停止中
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 w-full flex justify-around mt-4">
                                <button type="button" onclick="location.href='{{ route('owner.shops.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">戻る</button>
                                <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">更新</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $('select').multipleSelect({

                formatSelectAll: function() {
                    return 'すべて';
                },
                formatAllSelected: function() {
                    return '全て選択されています';
                }
            });
        });
    </script>
        @vite(['resources/js/CMS.js'])


</x-app-layout>
