<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use App\Models\Brand;
use App\Models\chart_size;
use App\Models\pavProduct;
use App\Models\Product;
use App\Models\Rating;
use App\Models\SizeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = DB::table('products')
        //     ->join('size_products', 'products.id_product', '=', 'size_products.id_product')
        //     ->select('products.*', 'size_products.*')
        //     ->orderBy('products.id_product', 'DESC')
        //     ->get();

        $product = Product::orderBy('id_product', 'DESC')->get();

        return view('Admin.product', [
            'product' => $product,
        ]);
    }

    public function addproduct()
    {
        $chart = chart_size::orderBy('uk_chart')->get();
        $brand = Brand::all();
        return view('Admin.AddProduct', [
            'chart' => $chart,
            'brand' => $brand
        ]);
    }

    public function editproduct($id)
    {
        $product = Product::where('id_product', $id)->first();
        $chart = SizeProduct::where('id_product', $id)->get();
        $brand = Brand::all();
        $addSize = chart_size::orderBy('uk_chart')->get();

        $a = [];
        $b = [];

        foreach ($addSize as $item) {
            $a[] = $item->uk_chart;
        }

        foreach ($chart as $item) {
            $b[] = $item->uk_size;
        }

        $result = array_diff($a, $b);

        return view('Admin.EditProduct', [
            'chart' => $chart,
            'product' => $product,
            'addSize' => $addSize,
            'idResult' => $result,
            'brand' => $brand
        ]);
    }

    public function deleteSize(Request $request)
    {
        SizeProduct::where('id_size', $request->id)->delete();
        return redirect()->back();
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
            'name_product' => 'required',
            'desc_product' => 'required',
            'stock_product' => 'required',
            'name_brand' => 'required',
            'images' => 'required',
            'product_status' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);

        $image = $request->file('images');
        $image->storeAs('public/product_images', $image->hashName());

        $angkaTanpaTitik = str_replace('.', '', $request->price);
        $angkaNumerik = intval($angkaTanpaTitik);

        $pro = new Product();
        $pro->name_product = $request->name_product;
        $pro->desc_product = $request->desc_product;
        $pro->stock_product = $request->stock_product;
        $pro->name_brand = $request->name_brand;
        $pro->image_product = $request->file('images')->hashName();
        $pro->product_status = $request->product_status;
        $pro->price_product = $angkaNumerik;
        $pro->save();

        foreach ($request->input('size') as $stock) {
            $size = new SizeProduct();
            $size->uk_size = $stock;
            $size->id_product = $pro->id;
            $size->save();
        }

        return redirect('/product')->with('success', 'Product Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $product = Product::where('id_product', $id)->first();
        $pro = Product::leftJoin('diskons', 'products.id_product', '=', 'diskons.id_product')
            ->select('products.*', 'diskons.total_harga', 'diskons.persen_diskon', 'diskons.tanggal_berlaku', 'diskons.id_diskon')
            ->where('products.id_product', $id)
            ->where('diskons.status', 'active')
            ->first();

        // Check apakah $pro null atau tidak
        if ($pro === null) {
            // Jika null, lakukan query tanpa join ke diskons
            $pro = Product::where('products.id_product', $id)
                ->first();
        }
        $size = SizeProduct::where('id_product', $id)->orderBy('uk_size')->get();
        $cek = pavProduct::where('id_product', $id)
            ->where('id_user', auth()->user()->id)
            ->first();

        $Similiar = Product::where('name_brand', $product->name_brand)
            ->where('id_product', '!=', $id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $alamat = alamat::where('id_user', auth()->user()->id)->get();

        $rate = DB::table('ratings')
            ->join('orders', 'ratings.id_orders', '=', 'orders.id_orders')
            ->join('users', 'ratings.id_user', '=', 'users.id')
            ->select('orders.*', 'ratings.*', 'users.*')
            ->where('orders.id_product', '=', $id)
            ->where('ratings.status_rate', '=', 'yes')->orderBy('ratings.waktu_rate', 'desc')->limit(5)->get();

        $countRate = DB::table('ratings')
            ->join('orders', 'ratings.id_orders', '=', 'orders.id_orders')
            ->where('orders.id_product', '=', $id)
            ->sum('ratings.start_rate');
        $totalPembeli = count($rate);

        $totalRate = 0; // Default total rate
        if ($totalPembeli > 0) {
            $totalRate = $countRate / $totalPembeli;
        }
        $formattedTotalRate = number_format($totalRate, 2);
        return view('User.Detail', [
            'product' => $pro,
            'size' => $size,
            'sameProduct' => $Similiar,
            'pav' => $cek,
            'alamat' => $alamat,
            'rate' => $rate,
            'totalRate' => $formattedTotalRate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $product = Product::where('id_product', $id)->first();
        $angkaTanpaTitik = str_replace('.', '', $request->price);
        $angkaNumerik = intval($angkaTanpaTitik);

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $image->storeAs('public/product_images', $image->hashName());

            Storage::delete('public/product_images/' . basename($product->image_product));

            Product::where('id_product', $id)->update([
                'name_product' => $request->name_product,
                'desc_product' => $request->desc_product,
                'stock_product' => $request->stock_product,
                'name_brand' => $request->name_brand,
                'image_product' => $image->hashName(),
                'product_status' => $request->product_status,
                'price_product' => $angkaNumerik,
            ]);
        } else {
            Product::where('id_product', $id)->update([
                'name_product' => $request->name_product,
                'desc_product' => $request->desc_product,
                'stock_product' => $request->stock_product,
                'name_brand' => $request->name_brand,
                'product_status' => $request->product_status,
                'price_product' => $angkaNumerik,
            ]);
        }

        return redirect('/product')->with('success', 'Update Berhasil');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;

        $product = Product::where('id_product', $id)->first();

        Storage::delete('public/product_images/' . basename($product->image_product));

        Product::where('id_product', $id)->delete();
        SizeProduct::where('id_product', $id)->delete();

        return redirect('/product')->with('success', 'Delete Berhasil');
    }
}
