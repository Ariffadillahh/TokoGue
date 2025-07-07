<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>TokoGue - Detail Pembelian</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="md:flex">
        @include('./Components/sidebar')
        <div class="md:mx-10 mx-3 md:w-full ">
            @if (session('error'))
                <div class="mt-5">
                    <div id="alert-2"
                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ session('error') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <nav class="flex my-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/dashboard"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4  h-4 mr-1 transition duration-75 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Orderan</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div>

                <div class="flex gap-5 w-full  p-3">
                    <div>
                        <img src={{ asset('storage/product_images/' . $item->image_product) }}
                            alt="{{ $item->name_product }}" class="w-[100px]">
                    </div>

                    <div class="w-full">
                        <div class="flex justify-between ">
                            <h1 class="font-mono  text-base">{{ $item->name_product }}</h1>
                            <h1 class="font-mono  text-base mt-1 uppercase text-primary">
                                {{ $item->status_orders }}</h1>
                        </div>
                        <p>{{ $item->name_brand }}</p>
                        <p>Size : {{ $item->size }}</p>

                    </div>
                </div>

                <div class="md:flex justify-between">
                    <div class="flex ">
                        <p class="font-mono text-lg md:text-xl mt-1 mr-3">Rp
                            {{ number_format($item->harga_product, '0', ',', '.') }}</p>
                        <p class="font-mono text-lg md:text-xl mt-1">x{{ $item->qty_orders }}</p>
                    </div>
                    <p class="font-mono text-lg md:text-xl ">Total : Rp
                        {{ number_format($item->total_harga, '0', ',', '.') }}</p>

                </div>


                <div class="mt-3 font-mono ">
                    <div class="">
                        <div class="md:flex justify-between">
                            <div>
                                <h1
                                    class="font-mono md:text-base text-xs mt-1 uppercase
                                    @if ($item->status_pembayaran === 'paid') text-primary
                                    @elseif($item->status_pembayaran === 'pending') text-blue-500
                                    @elseif(in_array($item->status_pembayaran, ['deny', 'cancel', 'expire'])) text-red-500
                                    @else text-gray-500 @endif">
                                    {{ $item->status_pembayaran }}
                                </h1>

                                </p>
                                <p>Tanggal Orders : <span class="uppercase">{{ $item->date_orders }}</span></p>
                                @if ($item->waktu_nerimapesanan)
                                    <p>Tanggal Terima Pesanan : <span
                                            class="uppercase">{{ $item->waktu_nerimapesanan }}</span>
                                    </p>
                                @endif
                            </div>
                            @if ($item->status_orders != 'prosesing')
                                <div>
                                    <p>Jasa Pengiriman : <span class="uppercase">{{ $item->jasa_antar }}</span></p>
                                    <p>No Resi : <span class="uppercase">{{ $item->no_resi }}</span></p>
                                </div>
                            @else
                        </div>

                        @if ($item->status_pembayaran === 'paid')
                            <form action={{ route('updateOrder') }} method="post">
                                @csrf
                                <div class="flex gap-2">
                                    <p class="text-lg">No Resi :</p>
                                    <input class="input input-bordered input-sm " type="text" name="noResi"
                                        placeholder="NO RESI" required autocomplete="off">
                                </div>
                                <input type="hidden" name="id" value="{{ $item->id_orders }}">
                                <div class="flex gap-2 mt-2">
                                    <p class="text-lg">Jasa Pengiriman : </span></p>
                                    <select class="p-1 rounded-md border" name="jasa" id="">
                                        <option value="jne">JNE</option>
                                        <option value="j&t">J&T</option>
                                        <option value="anteraja">ANTERAJA</option>
                                    </select>
                                </div>
                                <div class="flex gap-2 mt-2">
                                    <p class="text-lg">Status Ordered :</p>
                                    <select class="p-1 rounded-md border" name="status" id="">
                                        <option value="diantar">DIANTAR</option>
                                    </select>
                                </div>
                                <button class="btn btn-secondary">Update</button>
                            </form>
                        @else
                        @endif

                        @endif

                    </div>
                </div>
                <div class=" py-4">
                    <div class="border w-full rounded shadow-md border-primary p-3">
                        <h1 class="font-mono text-xl">{{ $item->name_penerima }}</h1>
                        <p class="font-mono">No hp : {{ $item->no_hp }}</p>
                        <p class="font-mono">Provinsi : {{ $item->name_provinsi }}</p>
                        <p class="font-mono">Kota : {{ $item->name_kota }}</p>
                        <p class="font-mono">Kecamatan : {{ $item->name_kecamatan }}</p>
                        <p class="font-mono">Kelurahan : {{ $item->name_kelurahan }}</p>
                        <p class="font-mono"> Alamat Detail : {{ $item->alamat_detail }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
