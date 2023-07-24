<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin;
use InterventionImage;
use App\Services\ImageService;

class AdminController extends Controller
{

    public function edit()
    {
        $admin = Admin::findOrFail(Auth::id());
        // dd($user);
        return view('admin.profile.index',
        compact('admin'));
    }


    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail(Auth::id());
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();

        return redirect()
        ->route('admin.profile.index')
        ->with(['message'=>'マイページを更新しました。',
        'status' => 'info']);
    }

}


