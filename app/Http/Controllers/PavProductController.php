<?php

namespace App\Http\Controllers;

use App\Models\pavProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PavProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $fav = pavProduct::where('id_user', auth()->user()->id)->get();
        $a= [];
        foreach ($fav as $key) {
            $a[] = $key->id_product;
        }
        
        $products = DB::table('products')
        ->join('pav_products', 'pav_products.id_product', '=', 'products.id_product')
        ->select('products.*', 'pav_products.*')
        ->whereIn('products.id_product', $a)
        ->where('pav_products.id_user', '=', Auth::user()->id)
        ->get();

        return view('User.Favorite' , [
            'fav' => $products,
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
       pavProduct::create([
        'id_product' => $request->id_product,
        'id_user' => auth()->user()->id
       ]);

       return redirect()->back()->with('success', 'Berhasil di tambahkan ke Favorite');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pavProduct  $pavProduct
     * @return \Illuminate\Http\Response
     */
    public function show(pavProduct $pavProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pavProduct  $pavProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, pavProduct $pavProduct)
    {   
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pavProduct  $pavProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pavProduct $pavProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pavProduct  $pavProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        pavProduct::where('id_pavpro', $request->idPav)->delete();
        return redirect()->back()->with('success', 'Berhasil di Hapus Dari Favorite');
    }
}
