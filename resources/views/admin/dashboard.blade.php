<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2">
                    <div class="h-full bg-white bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
                            ユーザーアカウント数
                        </h1>
                        <p class="text-2xl leading-relaxed mb-3 mt-10">
                           現在：{{ $userNumber }}個
                        </p>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div
                        class="h-full bg-white bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
                            オーナーアカウント数
                        </h1>
                        <p class="text-2xl leading-relaxed mb-3 mt-10">
                            現在：{{ $ownerNumber }}個
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
