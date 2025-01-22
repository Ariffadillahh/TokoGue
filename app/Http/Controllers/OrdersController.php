<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'dikemas')->orderBy('id_orders', 'DESC')->get();

        $ordersAntar = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'diantar')->get();

        $ordersSelesai = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'selesai')->get();

        return view('User.Orders.Dikemas', [
            'orders' => $orders,
            'diantar' => $ordersAntar,
            'selesai' => $ordersSelesai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diantar()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'diantar')->orderBy('id_orders', 'DESC')->get();

        $selesai = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'selesai')->get();

        $dikemas = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'dikemas')->get();

        return view('User.Orders.Diantar', [
            'orders' => $orders,
            'dikemas' => $dikemas,
            'selesai' => $selesai
        ]);
    }

    public function search(Request $request)
    {

        $query = $request->input('q');
        $product = Product::orderBy('id_product', 'DESC')
            ->where('name_product', 'like', '%' . $query . '%')
            ->orWhere('name_brand', 'like', '%' . $query . '%')->get();

        return view('User.Search', [
            'product' => $product,
            'q' => $query
        ]);
    }

    public function selesai()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'selesai')->orderBy('id_orders', 'DESC')->get();

        $dikemas = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'dikemas')->get();

        $diantar = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'diantar')->get();

        return view('User.Orders.Selesai', [
            'orders' => $orders,
            'dikemas' => $dikemas,
            'diantar' => $diantar
        ]);
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
            'size' => 'required',
            'alamat' => 'required',
            'qty' => 'required',
        ]);

        $total_harga = $request->qty * $request->price;

        if ($request->qty > 5) {
            $diskon = 5;
            $totalHargaDiskon = $diskon / 100 * $total_harga;
            $total_harga -= $totalHargaDiskon;
        }

        if ($request->qty > 10) {
            $diskon = 15;
            $totalHargaDiskon = $diskon / 100 * $total_harga;
            $total_harga -= $totalHargaDiskon;
        }


        $orders = new Orders();
        $orders->id_product = $request->id_product;
        $orders->id_alamat = $request->alamat;
        $orders->id_user = auth()->user()->id;
        $orders->qty_orders = $request->qty;
        $orders->metode_pembayaran = 'cod';
        $orders->status_orders = 'dikemas';
        $orders->date_orders =  Carbon::now();
        $orders->total_harga =  $total_harga;
        $orders->size = $request->size;
        $orders->harga_product = $request->price;
        $orders->save();

        $rate = new Rating();
        $rate->id_orders = $orders->id;
        $rate->id_user = auth()->user()->id;
        $rate->status_rate = 'no';
        $rate->save();

        DB::transaction(function () use ($request) {
            $product = Product::where('id_product', $request->id_product)->first();

            if ($product) {
                $stockProduct = $product->stock_product;

                $finalStockProduct = max($stockProduct - $request->qty, 0);

                Product::where('id_product', $request->id_product)->update([
                    'stock_product' => $finalStockProduct
                ]);

                if ($finalStockProduct == 0) {
                    Product::where('id_product', $request->id_product)->update([
                        'product_status' => 'sold'
                    ]);
                }
            }
        });

        return redirect('/orders/dikemas');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function detail(Orders $orders, $id)
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
            ->join('ratings', 'ratings.id_orders', '=', 'orders.id_orders')
            ->select('orders.*', 'products.*', 'alamats.*', 'ratings.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.id_orders', '=', $id)->first();


        return view('User.Orders.Detail', [
            'item' => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Orders $orders)
    {
        Orders::where('id_orders', $request->id)->where('id_user', auth()->user()->id)->update([
            'status_orders' => 'selesai',
            'waktu_nerimapesanan' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Thankyou sudah berbelanja di TokoGue');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        $request->validate([
            'noResi' => 'required',
        ]);

        Orders::where('id_orders', $request->id)->update([
            'no_resi' => $request->noResi,
            'jasa_antar' => $request->jasa,
            'status_orders' => $request->status
        ]);

        return redirect()->back()->with('success', 'Berhasil Update status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
