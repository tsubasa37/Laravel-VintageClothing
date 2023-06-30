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
                <form action="{{ route('user.question.store') }}" method="POST">
                @csrf
                <div class="p-2 w-1/2 mx-auto">
                    <label for="title">タイトル</label>
                    <input type="text" name="title" id="title" cols="30" value="{{ old('title') }}" rows="2" required class="w-full rounded-lg border-2 bg-gray-100 @error('title') border-red-500 @enderror">
                    @error('title')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4 p-2 w-1/2 mx-auto">
                    <label for="body">内容</label>
                    <textarea name="content" id="body" cols="30" rows="4" required class="w-full rounded-lg border-2 bg-gray-100 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::id }}"> --}}
                    <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('Submit') }}</button>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>