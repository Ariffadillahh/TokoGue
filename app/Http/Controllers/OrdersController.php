<?php

namespace App\Http\Controllers;

use App\Models\alamat;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{

    public function index()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->select('orders.*', 'products.*')
            ->where('orders.id_user', '=', auth()->user()->id)
            ->where('orders.status_orders', '=', 'prosesing')->orderBy('id_orders', 'DESC')->get();

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
            ->where('orders.status_orders', '=', 'prosesing')->get();

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
            ->where('orders.status_orders', '=', 'prosesing')->get();

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
        $orders->status_pembayaran = 'cod';
        $orders->status_orders = 'prosesing';
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


    public function edit(Request $request, Orders $orders)
    {
        Orders::where('id_orders', $request->id)->where('id_user', auth()->user()->id)->update([
            'status_orders' => 'selesai',
            'waktu_nerimapesanan' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Thankyou sudah berbelanja di TokoGue');
    }

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

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_id');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed === $request->signature_key) {
            try {
                $order = Orders::where('order_id', $request->order_id)->first();

                if (!$order) {
                    return response()->json(['message' => 'Order not found'], 404);
                }

                $message = ''; 

                if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                    if (!empty($order->order_id)) {
                        Orders::where('order_id', $order->order_id)->update([
                            'status_pembayaran' => 'paid'
                        ]);
                    } else {
                        return response()->json(['message' => 'Order ID is invalid'], 400);
                    }
                    $message = 'Payment has been successfully completed.';
                } elseif ($request->transaction_status === 'pending') {
                    if (!empty($order->order_id)) {
                        Orders::where('order_id', $order->order_id)->update([
                            'status_pembayaran' => 'pending'
                        ]);
                    } else {
                        return response()->json(['message' => 'Order ID is invalid'], 400);
                    }
                    $message = 'Payment is still pending. Please complete your payment.';
                } elseif (in_array($request->transaction_status, ['deny', 'cancel', 'expire'])) {
                    if (!empty($order->order_id)) {
                        Orders::where('order_id', $order->order_id)->update([
                            'status_pembayaran' => $request->transaction_status
                        ]);

                        $message = "Payment status updated to '{$request->transaction_status}'. Please check your payment details.";
                    } else {
                        return response()->json(['message' => 'Order ID is invalid'], 400);
                    }
                    $message = 'Payment failed. Please try again or contact support.';
                } else {
                    $message = 'Unknown transaction status received.';
                }

                return response()->json([
                    'message' => $message,
                    'order' => $order,
                ]);
            } catch (\Exception $e) {
                Log::error('Error processing callback', [
                    'error' => $e->getMessage(),
                    'order_id' => $request->order_id,
                ]);
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
    }


    public function getSnapToken(Request $request)
    {
        $request->validate([
            'size' => 'required',
            'alamat' => 'required',
            'qty' => 'required',
        ]);

        $order_id = 'ORDER-' . uniqid();
        $total_harga = $request->qty * $request->price;

        if ($request->qty > 10) {
            $diskon = 15;
            $totalHargaDiskon = $diskon / 100 * $total_harga;
            $total_harga -= $totalHargaDiskon;
        } elseif ($request->qty > 5) {
            $diskon = 5;
            $totalHargaDiskon = $diskon / 100 * $total_harga;
            $total_harga -= $totalHargaDiskon;
        }

        try {
            DB::beginTransaction();

            $orders = new Orders();
            $orders->id_product = $request->id_product;
            $orders->id_alamat = $request->alamat;
            $orders->id_user = auth()->user()->id;
            $orders->qty_orders = $request->qty;
            $orders->status_pembayaran = 'unpaid';
            $orders->status_orders = 'prosesing';
            $orders->date_orders = Carbon::now();
            $orders->total_harga = $total_harga;
            $orders->size = $request->size;
            $orders->harga_product = $request->price;
            $orders->order_id = $order_id;
            $orders->save();

            $rate = new Rating();
            $rate->id_orders = $orders->id;
            $rate->id_user = auth()->user()->id;
            $rate->status_rate = 'no';
            $rate->save();

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

            $alamat = alamat::where('id_alamat', $request->alamat)->first();

            \Midtrans\Config::$serverKey = config('midtrans.server_id');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $order_id,
                    'gross_amount' => $total_harga,
                ],
                'customer_details' => [
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => $alamat->no_hp,
                    'alamat' => $alamat->alamat_detail,
                ],
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            DB::commit();

            return response()->json(['snapToken' => $snapToken]);
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Error creating transaction', [
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Failed to process the transaction',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
