<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Owner;
use InterventionImage;
use App\Services\ImageService;

class OwnerController extends Controller
{

    public function edit()
    {
        $owner = Owner::findOrFail(Auth::id());
        // dd($user);
        return view('owner.profile.index',
        compact('owner'));
    }


    public function update(Request $request, string $id)
    {
        $owner = Owner::findOrFail(Auth::id());
        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->save();

        return redirect()
        ->route('owner.profile.index')
        ->with(['message'=>'マイページを更新しました。',
        'status' => 'info']);
    }

}


