<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $alamat = alamat::where('id_user', auth()->user()->id)->get();
        return view('User.Alamat', [
            'alamat' => $alamat
        ]);
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
        alamat::create([
            'name_penerima' => $request->namap,
            'no_hp' => $request->nohp,
            'name_provinsi' => $request->provinsi,
            'name_kota' => $request->kota,
            'name_kecamatan' => $request->kecamatan,
            'name_kelurahan' => $request->kelurahan,
            'alamat_detail' => $request->alamatDetail,
            'id_user' => auth()->user()->id
        ]);

        return redirect()->back()->with('success', 'Alamat berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alamat $alamat)
    {
        alamat::where('id_alamat', $request->id)->update([
            'name_penerima' => $request->namap,
            'no_hp' => $request->nohp,
            'name_provinsi' => $request->provinsi,
            'name_kota' => $request->kota,
            'name_kecamatan' => $request->kecamatan,
            'name_kelurahan' => $request->kelurahan,
            'alamat_detail' => $request->alamatDetail,
        ]);

        return redirect()->back()->with('success', 'Alamat berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        alamat::where('id_alamat', $request->id)->delete();
        return redirect()->back()->with('success', 'Alamat berhasil di hapus');
    }
}
