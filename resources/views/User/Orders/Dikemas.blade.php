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
</head>

<body>
    @include('../../Components/navbar')
    <div class="md:mx-14 mx-3 my-5">
        <ul
            class="flex text-sm font-medium text-center text-gray-500 rounded-lg shadow">
            <li class="w-full">
                <a href="/orders/dikemas"
                    class="inline-block w-full p-4 text-gray-900 bg-gray-100 border-r border-gray-200 rounded-s-lg "
                    aria-current="page">Dikemas @if (count($orders) == 0)
                    @else
                    <span class="text-primary">({{count($orders)}})</span>
                    @endif</a>
            </li>
            <li class="w-full">
                <a href="/orders/diantar"
                    class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 hover:bg-gray-50 ">Diantar @if (count($diantar) == 0)
                    @else
                    <span class="text-primary">({{count($diantar)}})</span>
                    @endif </a>
            </li>
            <li class="w-full">
                <a href="/orders/selesai"
                    class="inline-block w-full p-4 bg-white border-r border-gray-200 hover:text-gray-700 hover:bg-gray-50 ">Selesai @if (count($selesai) == 0)
                    @else
                    <span class="text-primary">({{count($selesai)}})</span>
                    @endif </a>
            </li>
        </ul>
        <div>   
            @if (count($orders) == 0)
                <div class="h-[20vh] flex justify-center items-center w-full">
                    <h1 class="font-mono">Tidak ada orderan</h1>
                </div>
            @endif
            @foreach ($orders as $item)
                <div>
                   <div class="flex gap-5 w-full border-b py-3">
                        <div>
                            <img src={{ asset('storage/product_images/' . $item->image_product) }}
                            alt="{{ $item->name_product }}" class="w-[200px]">
                        </div>
                       
                        <div class="w-full">
                            <div class="flex justify-between mt-5">
                                <h1 class="font-mono  text-base md:text-2xl ">{{$item->name_product}}</h1>
                                <h1 class="font-mono md:text-base text-xs mt-1 uppercase text-primary">dikemas</h1>
                            </div>
                            <p>{{$item->name_brand}}</p>
                            <p>Size : {{$item->size}}</p>
                            <p>x{{$item->qty_orders}}</p>
                            <div class="flex justify-end">
                                <p class="font-mono text-lg md:text-xl ">Rp {{number_format($item->total_harga,'0',',','.')}}</p>
                            </div>
                        </div>
                   </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('../../Components/footer')
</body>

</html>
