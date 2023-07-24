<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <x-flash-message status="session('status')" />
                <form action="{{ route('admin.profile.update', ['admin' => Auth::user()->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="my_page mt-10">
                        <div class="">
                            <input type="text" id="name" name="name" value="{{ $admin->name }}" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class=" mt-6">
                            <input type="text" id="email" name="email" value="{{ $admin->email }}" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="p-2 w-full flex justify-end mt-4">
                        <button type="submit"
                            class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @vite(['resources/js/flash-message.js'])
    <script>

    </script>
</x-app-layout>
