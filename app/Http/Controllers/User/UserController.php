<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        // dd($user);
        return view('user.profile.index',
        compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()
        ->route('user.profile.index')
        ->with(['message'=>'マイページを更新しました。',
        'status' => 'info']);
    }

}


