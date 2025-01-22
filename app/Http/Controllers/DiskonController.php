<?php

namespace App\Http\Controllers;

use App\Models\diskon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $diskon = DB::table('diskons')->join('products', 'diskons.id_product', '=', 'products.id_product')->select('diskons.*', 'products.*')->get();
        return view('Admin.diskonProduct', [
            'product' => $product,
            'diskon' => $diskon
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
        $request->validate([
            'product' => 'required',
            'diskon' => 'required',
            'tgl' => 'required',
        ]);

        $existingDiscount = diskon::where('id_product', $request->product)->first();

        if ($existingDiscount) {
            return redirect()->back()->with('error', "Discount for this product already exists.");
        }

        $product = Product::where('id_product', $request->product)->first();


        $totalHargaDiskon = $request->diskon / 100 * $product->price_product;
        $totalHarga = $product->price_product - $totalHargaDiskon;

        diskon::create([
            'id_product' => $request->product,
            'persen_diskon' => $request->diskon,
            'total_harga' => $totalHarga,
            'tanggal_berlaku' => $request->tgl,
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', "Berhasil tambah diskon ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function show(diskon $diskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function edit(diskon $diskon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diskon $diskon)
    {

        $product = Product::where('id_product', $request->id_product)->first();
        $diskon = diskon::where('id_diskon', $request->id)->first();

        $totalHargaDiskon = $request->diskon / 100 * $product->price_product;
        $totalHarga = $product->price_product - $totalHargaDiskon;

        if ($request->date === null) {
            $tgl_lama = $diskon->tanggal_berlaku;
            diskon::where('id_diskon', $request->id)->update(
                [
                    'persen_diskon' => $request->diskon,
                    'total_harga' => $totalHarga,
                    'tanggal_berlaku' => $tgl_lama,
                    'status' => $request->status
                ]
            );
        } else {
            diskon::where('id_diskon', $request->id)->update(
                [
                    'persen_diskon' => $request->diskon,
                    'total_harga' => $totalHarga,
                    'tanggal_berlaku' => $request->date,
                    'status' => $request->status
                ]
            );
        }


        return redirect()->back()->with('success', "Berhasil Edit diskon");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        diskon::where('id_diskon', $request->id)->delete();
        return redirect()->back()->with('success', 'Berhasil Hapus Diskon');
    }
}
