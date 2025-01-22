<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search - TokoGue</title>
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('./Components/navbar')
    <div class="md:my-10 mx-3 md:mx-5 lg:mx-10">
        @if (strlen($q) == 0)
            <h1 class="text-lg font-mono">Mencari : ALL Product</h1>
        @else
            <h1 class="text-lg font-mono">Mencari : {{ $q }}</h1>
        @endif
        @if (count($product) == 0)
            <div class="h-[50vh] flex justify-center items-center">
                <P class="text-lg font-mono">Tidak ada product {{ $q }}</P>
            </div>
        @else
            <div class="grid lg:grid-cols-5 md:grid-cols-4 md:gap-5 gap-3 grid-cols-2 my-5">
                @foreach ($product as $item)
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
                                <h1 class="font-semibold text-lg font-mono line-clamp-2 ">{{ $item->name_product }}</h1>
                                <h1 class="font-light text-sm font-mono truncate my-1">{{ $item->name_brand }}</h1>
                                <p class="text-base font-mono truncate">Rp
                                    {{ number_format($item->price_product, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    @include('./Components/footer')
</body>

</html>
