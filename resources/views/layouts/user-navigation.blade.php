<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            {{-- <div class="flex"> --}}
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <div class="logo">
                    <a href="{{ route('user.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:mr-10 sm:flex hover:text-blue-400">
                    <x-nav-link :href="route('user.questions.index')" :active="request()->routeIs('user.questions.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                        Q&A
                    </x-nav-link>
                    <x-nav-link :href="route('user.items.index')" :active="request()->routeIs('user.items.index')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        商品
                    </x-nav-link>
                    @guest
                        <x-nav-link :href="route('user.login')" :active="request()->routeIs('user.login')">
                            ログイン
                        </x-nav-link>
                    @endguest
                    @auth
                        <x-nav-link :href="route('user.cart.index')" :active="request()->routeIs('user.cart.index')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            カート
                        </x-nav-link>
                    @endauth

                </div>
                {{-- </div> --}}


                <!-- Settings Dropdown -->
                <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                            <header class="modal__header">
                                <button type="button" class="modal__close" aria-label="Close modal"
                                    data-micromodal-close></button>
                            </header>
                            <main class="nav_modal modal__content" id="modal-1-content">
                                <x-dropdown-link :href="route('user.profile.index')">
                                    マイページ
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('user.items.favorite')">
                                    お気に入り
                                </x-dropdown-link>
                                @auth
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('user.logout')"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                            class="text-red-400">
                                            ログアウト
                                        </x-dropdown-link>
                                    </form>
                                @endauth
                            </main>
                            <footer class="modal__footer">
                                <button type="button" class="modal__btn" data-micromodal-close
                                    aria-label="Close this dialog window">閉じる</button>
                            </footer>
                        </div>
                    </div>
                </div>
                <div class="">
                    <a class="" data-micromodal-trigger="modal-1" href='javascript:;'>
                        <div class="header_icon">
                            @auth
                                <x-user-image-thumbnail :filename="Auth::user()->image" type="gazou" />
                            @endauth
                            @guest
                                <img src="/images/noimage.png" alt="">
                            @endguest
                        </div>
                    </a>
                </div>
            </div>

            @guest
                <x-nav-link :href="route('user.login')" :active="request()->routeIs('user.login')" class="mobile-login">
                    ログイン
                </x-nav-link>
            @endguest
            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                {{ __('ホーム') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.questions.index')" :active="request()->routeIs('user.questions.index')">
                Q&A
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.items.index')" :active="request()->routeIs('user.items.index')">
                商品一覧
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.cart.index')" :active="request()->routeIs('user.cart.index')">
                カートを表示
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <x-dropdown-link :href="route('user.profile.index')">
                マイページ
            </x-dropdown-link>
            <x-dropdown-link :href="route('user.items.favorite')">
                お気に入り
            </x-dropdown-link>

            <!-- Authentication -->
            @auth
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('user.logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-red-400">
                        ログアウト
                    </x-dropdown-link>
                </form>
            @endauth
        </div>
    </div>
</nav>
