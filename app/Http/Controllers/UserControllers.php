<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserControllers extends Controller
{
    public function settingsGen(Request $request)
    {
        if ($request->file('image')) {
            $user = User::where('id', auth()->user()->id)->first();
            Storage::delete('public/image_user/' . basename($user->image));
            $image = $request->file('image');
            $image->storeAs('public/image_user', $image->hashName());
            User::where('id', auth()->user()->id)->update([
                'image' => $request->file('image')->hashName(),
            ]);
        } else {
            User::where('id', auth()->user()->id)->update([
                'name' => $request->name
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil Update General');
    }

    public function settingsPass(Request $request)
    {

        $password = User::where('id', auth()->user()->id)->first();
        if (!Hash::check($request->pl, $password->password)) {
            return redirect()->back()->with('error', 'Password tidak sama');
        }
        $hashedPassword = Hash::make($request->pb);
        User::where('id', auth()->user()->id)->update([
            'password' => $hashedPassword,
        ]);

        return redirect()->back()->with('success', 'Berhasil Update Password');
    }
}
