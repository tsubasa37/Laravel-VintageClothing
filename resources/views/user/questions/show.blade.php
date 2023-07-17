<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            質問詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="card mb-2">
                        <div class="card-body">
                            <h5 class="card-title">
                                タイトル:{{ $thread->title }}
                            </h5>
                            <h5 class="card-title">
                                投稿者:{{ $thread->user->name }}
                            </h5>
                            <p class="card-text">{{ $thread->content }}</p>
                            <div class="thread-image">
                                @auth
                                    <x-questions-image-thumbnail :filename="$thread->image1" type="questions" />
                                @endauth
                            </div>
                        </div>
                    </div>
                    @foreach ($comments as $comment)
                        @if ($thread->user_id == $comment->user_id)
                            <div class="flex comment">
                                <div class="balloon2-right">
                                    <p>{{ $comment->comment }}</p>
                                    @auth
                                        @if (Auth::user()->id == $comment->user->id)
                                            <form id="delete_{{ $comment->id }}"
                                                action="{{ route('user.comment.delete', ['comment' => $comment->id]) }}"
                                                method="post" class="comment-delete flex">
                                                @csrf
                                                <button type="submit" data-id="{{ $comment->id }}"
                                                    onclick="deletePost(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                <div class="comment-icon">
                                    @auth
                                        {{-- @if (Auth::user()->id == $comment->user_id) --}}
                                        <x-user-image-thumbnail :filename="$comment->user->image" type="gazou" />
                                        {{-- @endif --}}
                                    @endauth
                                    @guest
                                        <img src="/images/noimage.png" alt="">
                                    @endguest
                                </div>
                            </div>
                        @else
                            <div class="flex comment">
                                <div class="comment-icon">
                                    @auth
                                        {{-- @if (Auth::user()->id == $comment->user_id) --}}
                                        <x-user-image-thumbnail :filename="$comment->user->image" type="gazou" />
                                        {{-- @endif --}}
                                    @endauth
                                    @guest
                                        <img src="/images/noimage.png" alt="">
                                    @endguest
                                </div>

                                <div class="balloon2-left">
                                    <p>{{ $comment->comment }}</p>
                                    @auth
                                        @if (Auth::user()->id == $comment->user->id)
                                            <form id="delete_{{ $comment->id }}"
                                                action="{{ route('user.comment.delete', ['comment' => $comment->id]) }}"
                                                method="post" class="comment-delete flex">
                                                @csrf
                                                @method('delete')
                                                <a data-id="{{ $comment->id }}" onclick="deletePost(this)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </a>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{ $comments->links() }}
                    @auth
                        <div class="p-6 comment-area">
                            <form action="{{ route('user.comment.store') }}" method="POST">
                                @csrf
                                <div class="mt-4 p-2 mx-auto">
                                    <p for="body">コメント</p>
                                    <textarea name="comment" id="body" required
                                        class="comment-txt rounded-lg border-1  @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-4 comment-btn">
                                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                    <button type="submit"
                                        class="bg-blue-400 rounded font-medium px-4 py-2 text-white">投稿</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div class="ml-10 question-post-btn">
                            <a href="{{ route('user.login') }}" class="question-page-signUp-btn post-btn">コメントを投稿</a>
                        </div>
                    @endguest
                </div>
            </div>
            <a href="{{ route('user.questions.index') }}" class="back-to-top js-to-top"><span>戻る</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.75 19.5l-7.5-7.5 7.5-7.5m-6 15L5.25 12l7.5-7.5" />
                    </svg>
                </span>
            </a>
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
