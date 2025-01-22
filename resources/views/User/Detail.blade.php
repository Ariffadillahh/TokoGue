<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>{{ $product->name_product }} - TokoGue</title>
    <script src="{{ asset('js/script.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .size::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="">
    @include('../Components/navbar')
    <div class="mx-3 md:mx-16 mt-10">
        @if (session('success'))
            <div class="mt-3">
                <div id="alert"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        onclick="closeAlert()">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Danger</span>
                <div>
                    <span class="font-medium">Gagal membuat orders:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="my-10">
            <nav class="flex overflow-hidden" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#969D43] ">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Homepage
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center ">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400 line-clamp-1">{{ $product->name_product }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="md:grid md:grid-cols-2 gap-5 my-5">
                <div class="relative">
                    <img src={{ asset('storage/product_images/' . $product->image_product) }}
                        alt="{{ $product->name_product }}" class="w-full">
                    @php
                        $waktuSekarang = \Carbon\Carbon::now();
                        // Konversi tanggal string dari database ke objek Carbon
                        $tanggalTentukan = $product->tanggal_berlaku;
                        // Hitung selisih waktu
                        $selisih = \Carbon\Carbon::parse($tanggalTentukan)->diffForHumans($waktuSekarang);

                    @endphp
                    @if ($product->total_harga !== null && $product->persen_diskon !== null)
                        <div class="absolute left-0 top-4">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded  uppercase">Diskon
                                {{ $product->persen_diskon }}%</span>
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">
                                {{ $selisih }} akan expired</span>
                        </div>
                    @endif
                    @if ($waktuSekarang > $product->tanggal_berlaku)
                        @php
                            DB::table('diskons')
                                ->where('id_diskon', $product->id_diskon)
                                ->update([
                                    'status' => 'expired',
                                ]);
                        @endphp
                    @endif
                </div>
                <div class="pt-5 md:pt-10 md:px-5">
                    <h1 class="text-lg md:text-xl lg:text-3xl font-mono">{{ $product->name_product }}</h1>
                    <h1 class="font-mono md:text-lg">{{ $product->name_brand }}</h1>

                    @if ($product->total_harga !== null && $product->persen_diskon !== null)
                        <div class="">
                            <p class="text-sm font-mono truncate md:mt-3 mt-1.5 line-through text-red-500">
                                Rp
                                {{ number_format($product->price_product, 0, ',', '.') }}
                            </p>
                            <p class="text-base md:text-lg lg:text-xl my-2 font-mono">
                                Rp. {{ number_format($product->total_harga, 0, ',', '.') }}
                            </p>

                        </div>
                    @else
                        <h1 class="text-base md:text-lg lg:text-xl my-2 font-mono">Rp
                            {{ number_format($product->price_product, 0, ',', '.') }}</h1>
                    @endif


                    <div class="my-6">
                        <p class="font-mono ">Select Size</p>

                        <form action={{ route('buy') }} method="post">
                            @csrf
                            <div class="flex gap-4 py-2 overflow-x-auto size">
                                @if ($product->product_status == 'sold' || (Auth()->user()->level == 'admin' || Auth()->user()->level == 'superadmin'))
                                    @foreach ($size as $item)
                                        <div>
                                            <input type="radio" name="size" value="{{ $item->uk_size }}"
                                                id="{{ $item->id_size }}" class="hidden peer" id="size" disabled
                                                onclick="checkInput()">
                                            <label for={{ $item->id_size }}
                                                class="inline-flex items-center justify-between w-[70px] p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-[#969D43] hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                                <div class="block mx-auto">
                                                    {{ $item->uk_size }}
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach ($size as $item)
                                        <div>
                                            <input type="radio" name="size" value="{{ $item->uk_size }}"
                                                id="{{ $item->id_size }}" class="hidden peer" id="size"
                                                onclick="checkInput()">
                                            <label for={{ $item->id_size }}
                                                class="inline-flex items-center justify-between w-[70px] p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-[#969D43] hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                                <div class="block mx-auto">
                                                    {{ $item->uk_size }}
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div id="modal" class="hidden fixed left-0 w-full top-0 z-40">
                                <div
                                    class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Confrim Your Order
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    onclick="closeModal('modal')">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="border-b pb-3">
                                                    @if (count($alamat) != 0)
                                                        <p class="font-mono mb-2">Pilih alamat anda</p>
                                                    @endif
                                                    @if (count($alamat) == 0)
                                                        <p class="font-mono">Anda belum memiliki alamat, <a
                                                                href="/alamat"
                                                                class="text-blue-600 hover:underline">Tamabah
                                                                alamat</a>
                                                        </p>
                                                    @endif
                                                    <div class="grid grid-cols-3 gap-4">
                                                        @foreach ($alamat as $alamats)
                                                            <div>
                                                                <input type="radio" name="alamat"
                                                                    value="{{ $alamats->id_alamat }}"
                                                                    id="pilih{{ $alamats->id_alamat }}"
                                                                    class="hidden peer">
                                                                <label for="pilih{{ $alamats->id_alamat }}"
                                                                    class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-[#969D43] hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                                                    <div class="">
                                                                        <h1 class="font-mono font-semibold">
                                                                            {{ $alamats->name_penerima }}</h1>
                                                                        <p class="font-mono text-gray-400">
                                                                            {{ $alamats->no_hp }}</p>
                                                                        <p class="font-mono text-gray-400">
                                                                            {{ Str::limit($alamats->alamat_detail, 10, '...') }}
                                                                        </p>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_product"
                                                    value="{{ $product->id_product }}">
                                                <input type="hidden" name="price"
                                                    value="{{ $product->total_harga !== null && $product->persen_diskon !== null ? $product->total_harga : $product->price_product }}">

                                                <input type="hidden" name="pembayaran" value="cod">


                                                <div class="border-b pb-3">
                                                    <div class="flex justify-between font-mono">
                                                        <p class=""> Jumlah Pesanan</p>
                                                        <p>Stock : {{ $product->stock_product }}</p>
                                                    </div>
                                                    <div class="flex gap-3 w-full my-3">
                                                        <div class="w-[10%] cursor-pointer text-2xl font-bold  flex justify-center items-center"
                                                            onclick="decrease()">-</div>
                                                        <input type="number" id="counterInput" name="qty"
                                                            min="1" value="1"
                                                            max="{{ $product->stock_product }}"
                                                            class="w-[80%] p-2 text-center border rounded focus:outline-none">
                                                        <div class="w-[10%] cursor-pointer text-2xl font-bold  flex justify-center items-center"
                                                            onclick="increase()">+</div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-mono">Metode Pembayaran</p>
                                                    <h1
                                                        class="w-full border p-3 rounded border-[#969D43] mt-1 cursor-pointer">
                                                        COD ( Cash on Delivery )
                                                        <span class="block text-red-600 italic">Free Ongkir seluruh
                                                            Indonesia</span>
                                                    </h1>
                                                    <div>
                                                        <p class="font-bold mt-3 ">Beli Lebih dari 5 Diskon 5% Dan Beli
                                                            lebih dari 10 diskon 10%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mx-5 pb-3">
                                                @if (count($alamat) == 0)
                                                    <button class="btn btn-success w-full" disabled>Orders</button>
                                                @else
                                                    <button class="btn btn-success w-full ">Orders</button>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="flex gap-3 my-5">
                            @if (Auth()->user()->level == 'admin' || Auth()->user()->level == 'superadmin')
                            @else
                                @if ($product->stock_product == 0)
                                    <div class="btn md:w-[90%]  w-3/4">
                                        Sold Out</div>
                                @else
                                    <div onclick="openModal('modal')" id="submitButton"
                                        class="btn pointer-events-none md:w-[90%]  duration-150 w-3/4">
                                        Pilih size</div>
                                @endif
                                @if (empty($pav))
                                    <form action={{ route('addPav') }} method="post" class="md:w-[10%] w-1/4">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $product->id_product }}">
                                        <button type="submit"
                                            class="btn  text-red-600 btn-outline hover:bg-red-600 hover:border-white w-full"><i
                                                class="fa-sharp fa-regular fa-heart text-lg"></i></button>
                                    </form>
                                @else
                                    <form action={{ route('unPav') }} method="post" class="md:w-[10%] w-1/4">
                                        @csrf
                                        <input type="hidden" name="idPav" value="{{ $pav->id_pavpro }}">
                                        <button data-tooltip-target="tooltip-light" data-tooltip-style="light"
                                            type="submit"
                                            class="btn  text-red-600 btn-outline hover:bg-red-600 hover:border-white w-full"><i
                                                class="fa-solid fa-heart text-lg"></i>
                                        </button>
                                        <div id="tooltip-light" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                            Hapus Favorite
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>

                                    </form>
                                @endif


                            @endif
                        </div>
                        <div>
                            <div class="bg-white text-gray-900 ">
                                <h2>
                                    <button type="button" onclick="descProduct()"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3">
                                        <span id="desc">Description</span>
                                        <div id="panah" class="rotate-180 duration-300 transition-all">
                                            <svg class="w-3 h-3 shrink-0" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </div>

                                    </button>
                                </h2>
                                <div id="descProduct" class="hidden">
                                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $product->desc_product }}
                                        </p>
                                    </div>
                                </div>
                                <h2>
                                    <button type="button" onclick="authentic()"
                                        class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500  border-b border-gray-200 gap-3">
                                        <span id="authenticText">Authentic. Trusted. Best Price.</span>
                                        <svg id="panahAuth"
                                            class="w-3 h-3 shrink-0 rotate-180 duration-300 transition-all"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                        </svg>
                                    </button>
                                </h2>
                                <div id="authentic" class="hidden">
                                    <div class="py-5 border-b border-gray-200 ">
                                        <p class="mb-2 text-gray-500 ">Dengan prosedur yang tepat, seluruh produk telah
                                            melalui proses pemeriksaan yang teliti dan mempunyai standar kualitas
                                            terpercaya pada setiap produk yang dijual. Berlakunya garansi dimulai dari
                                            produk diterima hingga satu minggu kedepan. Jika memiliki keluhan tentang
                                            produk yang kamu beli bisa langsung hubungi customer service kami.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    @if (count($rate) == 0)
                    @else
                        <div class="flex items-center justify-center">
                            <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">{{ $totalRate }}</p>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                            <p class="text-sm font-medium text-gray-900 underline hover:no-underline dark:text-white">
                                {{ count($rate) }}
                                reviews</p>
                        </div>
                    @endif

                </div>
                @foreach ($rate as $item)
                    <article class="my-5 border-b">
                        <div class="flex items-center mb-4">
                            @if (Auth::user()->image)
                                <img class="w-10 h-10 me-4 rounded-full"
                                    src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                                    alt="{{ Auth::user()->name }}">
                            @else
                                <img class="w-10 h-10 me-4 rounded-full"
                                    src="{{ asset('storage/image_user/ppkosong.jpg') }}"
                                    alt="{{ Auth::user()->name }}">
                            @endif
                            <div class="font-medium dark:text-white">
                                <p>{{ $item->name }}
                                <p class="block text-sm text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($item->waktu_rate)->diffForHumans() }}</p>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">


                            @for ($i = 0; $i < $item->start_rate; $i++)
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            @endfor
                            @switch($item->start_rate)
                                @case(1)
                                    <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">So Bad!!!</h3>
                                @break

                                @case(2)
                                    <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">Bad!!</h3>
                                @break

                                @case(3)
                                    <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">Good</h3>
                                @break

                                @case(4)
                                    <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">So Good</h3>
                                @break

                                @case(5)
                                    <h3 class="ms-2 text-sm font-semibold text-gray-900 dark:text-white">Amazing</h3>
                                @break

                                @default
                            @endswitch
                        </div>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $item->komentar }}</p>
                    </article>
                @endforeach
            </div>
            <div class="">
                @if (count($sameProduct) != 0)
                    <p class="text-center py-2 font-mono md:text-lg">Similiar Product</p>
                    <div class="w-[40px] h-1 bg-primary mx-auto block rounded"></div>
                @endif
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4 my-3">
                    @foreach ($sameProduct as $item)
                        <a href="{{ route('detail', $item->id_product) }}">
                            <div class="hover:text-[#969D43] duration-150 cursor-pointer ">
                                <div class="relative overflow-hidden ">
                                    <img src={{ asset('storage/product_images/' . $item->image_product) }}
                                        alt="{{ $item->name_product }}" class="w-full   ">
                                    @if ($item->stock_product == 0)
                                        <div class="absolute top-1 left-2 ">
                                            <span
                                                class="bg-pink-100 ml-1 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 uppercase">Sold
                                                Out</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h1 class="font-semibold text-lg font-mono line-clamp-2">{{ $item->name_product }}
                                    </h1>
                                    <h1 class="font-light text-sm font-mono truncate">{{ $item->name_brand }}</h1>
                                    <p class="text-base font-mono truncate">Rp
                                        {{ number_format($item->price_product, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('../Components/footer')



    <script>
        function increase() {
            // Mendapatkan elemen input

            var inputElement = document.getElementById('counterInput');

            // Mendapatkan nilai saat ini dan menambahkannya
            var currentValue = parseInt(inputElement.value);
            inputElement.value = currentValue + 1;
        }

        function decrease() {
            // Mendapatkan elemen input

            var inputElement = document.getElementById('counterInput');

            // Mendapatkan nilai saat ini dan mengurangkannya, tetapi tidak kurang dari 1
            var currentValue = parseInt(inputElement.value);
            inputElement.value = Math.max(currentValue - 1, 1);
        }
    </script>
</body>

</html>
