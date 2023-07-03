<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $users = User::select('id','name','email','created_at')->paginate(3);

        return view('admin.users.index',
        compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','min:4', 'confirmed','string'],
        ]);

                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

        return redirect()
        ->route('admin.users.index')
        ->with(['message'=>'ユーザー登録を実施しました。',
        'status' => 'info']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()
        ->route('admin.users.index')
        ->with(['message'=>'オーナー情報を更新しました。',
        'status' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ソフトデリート
        User::findOrFail($id)->delete();
        return redirect()
        ->route('admin.users.index')
        ->with(['message'=>'ユーザー情報を削除しました。',
        'status' => 'alert']);
    }


    // 期限切れ
    public function expiredUserIndex(){
        $expiredUsers = User::onlyTrashed()->get();
        return view('admin.expired-users',compact('expiredUsers'));
        }
        public function expiredUserDestroy($id){
            User::onlyTrashed()->findOrFail($id)->forceDelete();
            return redirect()->route('admin.expired-users.index');
        }
}
