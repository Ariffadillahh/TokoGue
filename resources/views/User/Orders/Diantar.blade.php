<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokoGue - Orders</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    @include('../../Components/navbar')
    @if (session('success'))
        <div id="alert" class="" role="alert">
            <div class="fixed top-0 w-full h-full bg-black/20">
                <div onclick="closeAlert()"
                    class='absolute md:bottom-[15%] bottom-[10%] text-white py-2 px-4 md:right-[48%] right-[43%] z-10 button w-16 h-16 bg-blue-500 rounded-full cursor-pointer select-none
                        active:translate-y-2  active:[box-shadow:0_0px_0_0_#1b6ff8,0_0px_0_0_#1b70f841]
                        active:border-b-[0px]
                        transition-all duration-150 [box-shadow:0_8px_0_0_#1b6ff8,0_13px_0_0_#1b70f841]
                        border-[1px] border-blue-400
  '>
                    <span class='flex flex-col justify-center items-center h-full text-white font-bold text-lg '><i
                            class="fa-solid fa-xmark"></i></span>
                </div>

                <div class="flex justify-center items-center h-full p-3">
                    <img src="{{ asset('storage/images/maaci.jpg') }}" class="md:w-1/4 rounded-md">
                </div>
            </div>
        </div>
    @endif

    <div class="md:mx-14 mx-3 my-5">
        <ul class="flex text-sm font-medium text-center text-gray-500 rounded-lg shadow">
            <li class="w-full">
                <a href="/orders/dikemas"
                    class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 hover:bg-gray-50 "
                    aria-current="page">Dikemas @if (count($dikemas) == 0)
                    @else
                        <span class="text-primary">({{ count($dikemas) }})</span>
                    @endif
                </a>
            </li>
            <li class="w-full">
                <a href="/orders/diantar"
                    class="inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 rounded-s-lg ">Diantar
                    @if (count($orders) == 0)
                    @else
                        <span class="text-primary">({{ count($orders) }})</span>
                    @endif
                </a>
            </li>
            <li class="w-full">
                <a href="/orders/selesai"
                    class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 hover:bg-gray-50 ">Selesai
                    @if (count($selesai) == 0)
                    @else
                        <span class="text-primary">({{ count($selesai) }})</span>
                    @endif
                </a>
            </li>
        </ul>
        <div>
            @if (count($orders) == 0)
                <div class="h-[20vh] flex justify-center items-center w-full">
                    <h1 class="font-mono">Tidak ada orderan</h1>
                </div>
            @endif
            @foreach ($orders as $item)
                <div class="border-b py-3">
                    <div class="flex gap-5 w-full ">
                        <div>
                            <img src={{ asset('storage/product_images/' . $item->image_product) }}
                                alt="{{ $item->name_product }}" class="w-[200px]">
                        </div>

                        <div class="w-full">
                            <div class="flex justify-between mt-5">
                                <h1 class="font-mono  text-base md:text-2xl ">{{ $item->name_product }}</h1>
                                <h1 class="font-mono md:text-base text-xs mt-1 uppercase text-primary">diantar</h1>
                            </div>
                            <p>{{ $item->name_brand }}</p>
                            <p>Size : {{ $item->size }}</p>
                            <p>x{{ $item->qty_orders }}</p>
                            <div class="hidden md:flex md:justify-between">
                                <p class="font-mono uppercase">Resi : {{ $item->jasa_antar }} {{ $item->no_resi }}</p>
                                <p class="font-mono text-lg md:text-xl ">Rp
                                    {{ number_format($item->total_harga, '0', ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="md:hidden mt-2">
                        <p class="font-mono uppercase">Resi : {{ $item->jasa_antar }} {{ $item->no_resi }}</p>
                        <p class="font-mono text-lg md:text-xl justify-end flex mt-2">Rp
                            {{ number_format($item->total_harga, '0', ',', '.') }}</p>
                    </div>
                    <div class="justify-between flex mt-3">
                        <p class="text-sm mt-3 italic text-gray-400">Silakan konfirmasi setelah menerima dan mengecek
                            pesanan.</p>
                        <form action={{ route('finishorder') }} method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id_orders }}">
                            <button class="rounded px-6 bg-primary text-white py-2 font-mono">Pesanan Diterima</button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    @include('../../Components/footer')
</body>

</html>
