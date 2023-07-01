<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
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
        Thread::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('user.question.index')
        ->with(['message'=>'店舗情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thread = Thread::find($id);
        $thread->comments = Comment::orderBy('created_at','desc')->paginate(3);
        // dd($thread->comments);
        // $comments = $thread->comments;
        // $comments->orderBy('created_at', 'DESC');
        // $thread ->orderBy('created_at','desc')
        // ->paginate(20);
        // dd($thread);


        // dd($thread);
        return view('user.questions.show', compact('thread'));
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
    public function destroy(string $id)
    {
        //
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
