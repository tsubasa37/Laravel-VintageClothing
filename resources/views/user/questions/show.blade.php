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
                        </div>
                    </div>
                    @foreach ($thread->comments as  $comment)
                    <div class="flex comment">
                        <div class="comment-icon">
                            @auth
                            <x-user-image-thumbnail :filename="Auth::user()->image" type="gazou" />
                        @endauth
                        @guest
                            <img src="/images/noimage.png" alt="">
                        @endguest
                        </div>
                        <div class="balloon2-left">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    </div>
                    @endforeach
                    {{ $thread->comments->links() }}
                    <div class="p-6 comment-area">
                        <form action="{{ route('user.comment.store')}}" method="POST">
                            @csrf
                            <div class="mt-4 p-2 mx-auto">
                                <p for="body">コメント</p>
                                <textarea name="comment" id="body" required class="comment-txt rounded-lg border-1  @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 comment-btn">
                                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                                <button type="submit" class="bg-blue-400 rounded font-medium px-4 py-2 text-white">投稿</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.questions.index') }}" class="back-to-top js-to-top"><span>戻る</span><span>＜＜</span></a>
        </div>
    </div>
    </x-app-layout>