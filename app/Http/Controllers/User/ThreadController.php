<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\shopImageService;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Comment;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $threads = Thread::all();
        $threads = Thread::orderBy('created_at','desc')
        ->searchKeyword($request->keyword)
        ->paginate(10);
        // dd($threads);
        $threads->load('user','comments');

        // dd($threads);

        // dd($threads);
        return view('user.questions.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd($thread);
        return view('user.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        // $thread = Thread::findOrFail($id);
        $imageFile1 = $request->image1; //一時保存

        if(!is_null($imageFile1)  && $imageFile1->isValid()){
            //   Storage::delete('public/shops/'.$shop->image1);
            $image1 = shopImageService::upload1($imageFile1, 'questions');
        }else{
            $image1 = '';
        }
        // dd($image1);

        Thread::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'image1' => $image1,
            'content' => $request->content,
        ]);

        return redirect()->route('user.questions.index')
        ->with(['message'=>'店舗情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thread = Thread::find($id);

        // $comments = Comment::select('*')->where('thread_id','=',$id)->orderBy('created_at','desc')->get();
        $comments = Comment::select('*')->where('thread_id','=',$id)->paginate(10);

        // dd($comments[1]->user->id);


        return view('user.questions.show', compact('thread','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Thread::where('threads.id', $id)
        ->delete();

        return redirect()
        ->route('user.questions.index')
        ->with(['message'=>'投稿を削除しました。',
        'status' => 'alert']);
    }
    // public function search(Request $request)
    // {
    //     // dd($request->keyword);
    //     $threads = Thread::where('title','like',"%{$request->keyword}%")
    //                 ->orWhere('content','like',"%{$request->keyword}%")
    //                 ->paginate(5);


    //     return view('user.questions.index', compact('threads'));
    // }
}
