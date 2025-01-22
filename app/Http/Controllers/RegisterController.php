<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Register.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:5|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $password = Hash::make($validateData['password']);
        
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->storeAs('public/image_user', $image->hashName());
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'level' => 'user',
                'image' => $request->file('image')->hashName()
            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'level' => 'user',                      
            ]);
        }

        return redirect('login')->with('succses', 'Register berhasil silahkan Login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        User::where("id",$id)->delete();
        return redirect()->back()->with('succses', "Berhasil hapus" );
    }
}
