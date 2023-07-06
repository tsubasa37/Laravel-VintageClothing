<x-app-layout>
<x-slot name="header">
    <div class="flex question_header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                質問一覧
            </h2>
        </div>
        <form action="" method="get" class="search-form-002">
            <label>
                <input type="text" name="keyword" placeholder="キーワードを入力">
            </label>
            <button aria-label="検索"></button>
        </form>
    </div>
</x-slot>

<div class="py-12">
    <div class="flex mj">
    <div class="ml-10 question-post-btn">
        <a href="{{ route('user.questions.create') }}" class="question-page-signUp-btn post-btn">質問を投稿する！</a>
    </div>

    </div>


    <x-flash-message status="session('status')" />
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if(count($threads) > 0)
                    @foreach ($threads as $thread)
                        <a class="text-left thread-box" href="{{ route('user.questions.show', $thread->id) }}">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="flex justify-between">
                                        <h5 class="card-title">
                                            タイトル:{{ $thread->title }}
                                        </h5>
                                        <p class="thread-create">{{  Carbon\Carbon::parse($thread->created_at)->format('Y年m月d日'); }}</p>
                                    </div>
                                    <h5 class="card-title">
                                        投稿者:{{ $thread->user->name }}
                                    </h5>
                                    <p class="card-text thread-content">{{ $thread->content }}</p>
                                </div>
                                @if(Auth::user()->id == $thread->user->id)
                                    <form id="delete_{{ $thread->id }}" action="{{ route('user.questions.delete', ['thread' => $thread->id ]) }}" method="post" class="thread-delete flex">
                                        @csrf
                                        <button type="submit" data-id="{{ $thread->id }}" onclick="deletePost(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </a>
                    @endforeach
                @else
                該当キーワードがありません！
                @endif
            </div>
        </div>
        {{ $threads->links() }}
    </div>
</div>

    <script>
            function deletePost(e) {
                'use strict';
                if (confirm('本当に削除してもいいですか?')) {
                    document.getElementById('delete_' + e.dataset.id).submit();
                }
            }
    </script>
</x-app-layout>