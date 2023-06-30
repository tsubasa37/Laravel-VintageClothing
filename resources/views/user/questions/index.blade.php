<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        質問一覧
    </h2>
</x-slot>

<div class="py-12">
    <div class="ml-10 question-post-btn">
        <a href="{{ route('user.questions.create') }}" class="question-page-signUp-btn post-btn">質問を投稿する！</a>
    </div>
    <x-flash-message status="session('status')" />
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @foreach ($threads as $thread)
                    <a class="text-left" href="{{ route('user.questions.show', $thread->id) }}">
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    タイトル:{{ $thread->title }}
                                </h5>
                                <h5 class="card-title">
                                    投稿者:{{ $thread->user->name }}
                                </h5>
                                <p class="card-text">{{ $thread->content }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        {{ $threads->links() }}
    </div>
</div>
</x-app-layout>