<?php

namespace App\Http\Controllers;

use App\Models\chart_size;
use App\Models\User;
use App\Models\login;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Login.index');
    }

    public function settings()
    {
        return view('User.Settings');
    }

    public function users()
    {
        $user = User::all();
        return view('Admin.Users', [
            'user' => $user
        ]);
    }

    public function addUsers(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        $password = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', "Berhasil tambah {$request->role}");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $chart = chart_size::orderBy('uk_chart')->get();

        return view('Admin.dashboard', [
            'chart' => $chart
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
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->level == 'admin' || $user->level == 'superadmin') {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('error', 'Email atau Password anda salah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {

        $pro = Product::leftJoin('diskons', function ($join) {
            $join->on('products.id_product', '=', 'diskons.id_product')
                ->where('diskons.status', 'active');
        })
            ->select('products.*', 'diskons.total_harga', 'diskons.persen_diskon')
            ->take(20)
            ->get();




        return view(
            "Homepage.index",
            [
                'product' => $pro
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\login  $login
     * @return \Illuminate\Http\Response
     */
    public function orderan()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
            ->select('orders.*', 'products.*', 'alamats.*')
            ->where('orders.status_orders', '=', 'prosesing')
            ->orderByRaw("
        CASE 
            WHEN orders.status_pembayaran = 'paid' THEN 1
            WHEN orders.status_pembayaran = 'pending' THEN 2
            WHEN orders.status_pembayaran IN ('deny', 'cancel', 'expire') THEN 3
            ELSE 4
        END ASC, orders.id_orders DESC
    ")
            ->get();

        return view('Admin.Orders', [
            'order' => $orders
        ]);
    }

    public function orderanDiantar()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
            ->select('orders.*', 'products.*', 'alamats.*')
            ->orderBy('orders.id_orders', 'desc')
            ->where('orders.status_orders', '=', 'diantar')
            ->get();

        return view('Admin.OrderanDiantar', [
            'order' => $orders
        ]);
    }

    public function orderanSelesai()
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
            ->select('orders.*', 'products.*', 'alamats.*')
            ->orderBy('orders.id_orders', 'desc')
            ->where('orders.status_orders', '=', 'selesai')
            ->get();

        return view('Admin.OrderanSelesai', [
            'order' => $orders
        ]);
    }

    public function orderanDetail($id)
    {
        $orders = DB::table('orders')
            ->join('products', 'orders.id_product', '=', 'products.id_product')
            ->join('alamats', 'orders.id_alamat', '=', 'alamats.id_alamat')
            ->select('orders.*', 'products.*', 'alamats.*')
            ->where('orders.id_orders', '=', $id)->first();

        return view('Admin.DetailOrder', [
            'item' => $orders
        ]);
    }

    public function destroy(login $login)
    {
        Auth::logout();
        return redirect('/');
    }
}
