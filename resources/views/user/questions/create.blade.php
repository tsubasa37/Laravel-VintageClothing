<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('New Thread') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('user.questions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="p-2 w-1/2 mx-auto">
                            <label for="title">タイトル</label>
                            <input type="text" name="title" id="title" cols="30"
                                value="{{ old('title') }}" rows="2" required class="w-full rounded-lg border-2 bg-gray-40 @error('title') border-red-500 @enderror">
                            @error('title')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div class="relative">
                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                <input type="file" id="image" name="image1" accept=“image/png,image/jpeg,image/jpg” class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="mt-4 p-2 w-1/2 mx-auto">
                            <label for="body">内容</label>
                            <textarea name="content" id="body" cols="30" rows="4" required
                                class="w-full rounded-lg border-2 bg-gray-40 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <div class="mt-4 p-2 text-center">
                                {{-- <input type="hidden" name="user_id" value="{{ Auth::id }}"> --}}
                                <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white ">投稿</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
