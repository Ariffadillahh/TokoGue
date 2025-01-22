<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <title>TokoGue</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('./Components/navbar')
    <div class="md:my-10 mx-3 md:mx-5 lg:mx-10">
        <div class=" mt-8">
            <div class="">
                <div>
                    <h1
                        class="text-xl md:text-2xl lg:text-4xl uppercase font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-pink-500">
                        Step into Style, </h1>
                    <h1
                        class="text-xl md:text-2xl lg:text-4xl uppercase font-black bg-clip-text text-transparent bg-gradient-to-r from-primary to-pink-500">
                        Stride with Confidence</h1>
                </div>
                <p
                    class="text-xl md:text-2xl lg:text-4xl uppercase font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-pink-500">
                    TokoGue, Where Every
                    Shoe Tells a
                    Story!</p>
            </div>
        </div>
        <div class="my-10">
            <div class="grid lg:grid-cols-5 md:grid-cols-4 md:gap-5 gap-3 grid-cols-2">
                @forelse ($product as $item)
                    <a href="{{ route('detail', $item->id_product) }}">
                        <div class="w-full bg-white rounded-md shadow-md overflow-hidden border group">
                            <div class="p-3">
                                <div
                                    class="relative md:min-h-[250px] flex justify-center items-center overflow-hidden  rounded-md">
                                    <img src={{ asset('storage/product_images/' . $item->image_product) }}
                                        alt="{{ $item->name_product }}"
                                        class="w-full object-cover transition-all duration-300 group-hover:scale-110 ">
                                    @if ($item->stock_product == 0)
                                        <div class="absolute top-1 right-2">
                                            <span
                                                class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 uppercase">Sold
                                                Out</span>
                                        </div>
                                    @endif
                                    @if ($item->total_harga !== null && $item->persen_diskon !== null)
                                        <div class="absolute top-1 left-2">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded  uppercase">Diskon
                                                {{ $item->persen_diskon }}%</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="md:p-2 mt-2">
                                    <h1 class="font-semibold text-base md:text-xl font-mono line-clamp-2 ">
                                        {{ $item->name_product }}</h1>

                                    @if ($item->total_harga !== null && $item->persen_diskon !== null)
                                        <div class="">
                                            <p
                                                class="text-sm font-mono truncate md:mt-3 mt-1.5 line-through text-red-500">
                                                Rp
                                                {{ number_format($item->price_product, 0, ',', '.') }}
                                            </p>
                                            <p class="md:text-lg text-sm font-mono truncate md:mt-3 mt-1.5">
                                                Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    @else
                                        <p class="md:text-lg text-sm font-mono truncate md:mt-3 mt-1.5">Rp
                                            {{ number_format($item->price_product ?? 0, 0, ',', '.') }}
                                        </p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div>
                        Not Product
                    </div>
                @endforelse
            </div>
        </div>


    </div>
    @include('./Components/footer')


</body>

</html>
