<x-guest-layout>
    <!-- Session Status -->
    ユーザー用
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('user.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="mt-4 mb-5">
            <x-primary-button class="login-btn">
                <p>ログイン</p>
            </x-primary-button>
        </div>
    </form>

    @if (Route::has('user.register'))
        <div class="text-end">
            <a href="{{ route('user.register') }}" class="mr-2 font-semibold text-blue-400 hover:text-blue-600">新規登録</a>
        </div>
    @endif
</x-guest-layout>
