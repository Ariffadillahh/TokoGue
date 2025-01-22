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
        <a href="/orders/selesai"><i class="fa-solid fa-arrow-left text-2xl"></i></a>
        <div class="flex gap-5 w-full  p-3">
            <div>
                <img src={{ asset('storage/product_images/' . $item->image_product) }} alt="{{ $item->name_product }}"
                    class="w-[100px]">
            </div>

            <div class="w-full">
                <div class="flex justify-between ">
                    <h1 class="font-mono  text-base">{{ $item->name_product }}</h1>
                    <h1 class="font-mono  text-base mt-1 uppercase text-primary">
                        {{ $item->status_orders }}</h1>
                </div>
                <p>{{ $item->name_brand }}</p>
                <p>{{ $item->size }}</p>

            </div>
        </div>

        @if ($item->qty_orders > 5)
            <p class="font-bold">Diskon 5%</p>
        @endif
        @if ($item->qty_orders > 10)
            <p class="font-bold">Diskon 15%</p>
        @endif
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
            <div class="md:flex justify-between">
                <div>
                    <p>Metode Pembayaran : <span class="uppercase">{{ $item->metode_pembayaran }}</span></p>
                    <p>Tanggal Orders : <span class="uppercase">{{ $item->date_orders }}</span></p>
                    <p>Tanggal Terima Pesanan : <span class="uppercase">{{ $item->waktu_nerimapesanan }}</span></p>
                </div>
                <div>
                    <p>Jasa Pengiriman : <span class="uppercase">{{ $item->jasa_antar }}</span></p>
                    <p>No Resi : <span class="uppercase">{{ $item->no_resi }}</span></p>
                </div>
            </div>
        </div>
        <div class="border-b border-black py-4">
            <div class="border w-full rounded shadow-md border-primary p-3">
                <h1 class="font-mono text-xl">{{ $item->name_penerima }}</h1>
                <p>{{ $item->no_hp }}</p>
                <p>{{ Str::limit($item->alamat_detail, 40, '...') }}</p>
            </div>
        </div>
        <div>
            @if ($item->status_rate == 'no')
                <p class="text-xl font-mono text-center my-4"> Rate Your Orders</p>
                <form action={{ route('addRating') }} method="post">
                    @csrf
                    <div class="my-4">
                        <p class="mb-1 font-mono">Rate</p>
                        <div class="rating">
                            <input type="radio" name="rating"
                                class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:list-none"
                                value="1" />
                            <input type="radio" name="rating"
                                class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:list-none" checked
                                value="2" />
                            <input type="radio" name="rating"
                                class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:list-none"
                                value="3" />
                            <input type="radio" name="rating"
                                class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:list-none"
                                value="4" />
                            <input type="radio" name="rating"
                                class="mask mask-star-2 bg-orange-400 checked:bg-orange-400 checked:list-none"
                                value="5" />
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $item->id_ratings }}">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="4" name="message"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                    <button class="w-full btn my-3 btn-primary">Submit</button>
                </form>
            @else
                <article class="my-5">
                    <div class="flex items-center mb-4">

                        @if (Auth::user()->image)
                            <img class="w-10 h-10 me-4 rounded-full"
                                src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <img class="w-10 h-10 me-4 rounded-full"
                                src="{{ asset('storage/image_user/ppkosong.jpg') }}" alt="{{ Auth::user()->name }}">
                        @endif

                        <div class="font-medium dark:text-white">
                            <p>{{ Auth::user()->name }}
                            <p class="block text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($item->waktu_rate)->diffForHumans() }}</p>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
                        @for ($i = 0; $i < $item->start_rate; $i++)
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
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
            @endif

        </div>
    </div>
    </div>

    @include('../../Components/footer')
</body>

</html>
