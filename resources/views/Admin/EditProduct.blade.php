<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <title>TokoGue - Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <div class="md:flex">
        @include('./Components/sidebar')
        <div class="md:mx-10 mx-3 md:w-full ">
            @if (session('error'))
                <div class="mt-5">
                    <div id="alert"
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
                            onclick="closeAlert()">
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
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/product"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Product</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit
                                Product</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div>
                <div class="md:grid md:grid-cols-2 gap-4 w-full">
                    <div class="w-full border rounded flex justify-center items-center py-5 bg-blue-100/20">
                        <img src={{ asset('storage/product_images/' . $product->image_product) }}
                            alt="{{ $product->name_product }}" class="max-w-[50%]">
                    </div>
                    <div class="w-full">
                        <label class="font-semibold text-sm ">Size</label>
                        <div
                            class="w-full my-3 md:w-[250px] xl:w-[520px] gap-2 grid grid-cols-5 md:grid-cols-4 xl:grid-cols-8  @error('size') border p-3 rounded-md border-red-500  @enderror">

                            @foreach ($chart as $size)
                                <div>
                                    <p class="p-5 border text-blue-500 border-blue-500 rounded-md">
                                        {{ $size['uk_size'] }}</p>
                                    <form action={{ route('delete-size') }} method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value={{ $size->id_size }}>
                                        <button type="submit" class="flex justify-center w-full p-1">
                                            <p class="text-center text-red-500 cursor-pointer"><i
                                                    class="fa-sharp fa-solid fa-trash"></i></p>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <div>
                            <label class="font-semibold text-sm ">Add Size</label>
                            <form action={{ route('addSize') }} method="post">
                                @csrf
                                @method('post')
                                <div
                                    class="w-full my-3 md:w-[250px] xl:w-[520px] gap-2 grid grid-cols-5 md:grid-cols-4 xl:grid-cols-8  @error('size') border p-3 rounded-md border-red-500  @enderror">

                                    @foreach ($addSize as $item)
                                        @if (in_array($item->uk_chart, $idResult))
                                            <div class="flex">
                                                <input type="hidden" name="id" value="{{ $product->id_product }}">
                                                <input type="checkbox" name="size[]" value="{{ $item->uk_chart }}"
                                                    id="{{ $item->chart_id }}" class="hidden peer">
                                                <label for={{ $item->chart_id }}
                                                    class="inline-flex items-center justify-between w-[70px] p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50 ">
                                                    <div class="block mx-auto">
                                                        {{ $item->uk_chart }}
                                                    </div>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <button class="btn btn-warning w-full" type="submit">Tambah Size</button>
                            </form>
                        </div>
                    </div>
                </div>
                <form action={{ route('edit', $product->id_product) }} method="post" class="mt-5"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="md:flex gap-4">
                        <div class="w-full">
                            <div class="w-full mb-3">
                                <label class="font-semibold text-sm ">Name Product</label>
                                <div class="relative w-full">
                                    <input type="text" id="simple-search" name="name_product"
                                        value="{{ $product->name_product }}"
                                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required>
                                </div>
                                @error('name_product')
                                    <p class="text-red-600 w-full">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="w-full mb-3">
                                <label class="font-semibold text-sm ">Price</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <i class="fa-solid fa-rupiah-sign"></i>
                                    </div>
                                    <input type="text" id="simple-search" name="price"
                                        value="{{ number_format($product->price_product, 0, ',', '.') }}"
                                        class="rupiah bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="XXXXXX" required>
                                </div>
                                @error('price_product')
                                    <p class="text-red-600 w-full">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="md:flex gap-4 md:my-5">
                        <div class="w-full">
                            <label class="font-semibold text-sm ">Stock Product</label>
                            <div class="relative w-full">
                                <input type="number" id="simple-search" name="stock_product"
                                    value="{{ $product->stock_product }}"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            @error('stock_product')
                                <p class="text-red-600 w-full">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label class="font-semibold text-sm ">Name Brand</label>
                            <select name="name_brand"
                                class="bg-gray-50 border border-gray-300 mb-3 text-gray-900 text-sm rounded-lg focus:ring-blue-500 uppercase focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{ $product->name_brand }}</option>
                                @foreach ($brand as $item)
                                    @if (strtolower($item->name_brand) != strtolower($product->name_brand))
                                        <option value="{{ $item->name_brand }}">{{ $item->name_brand }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('product_status')
                                <p class="text-red-600 -mt-3 w-full">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="md:flex gap-4">
                        <div class="w-full">
                            <label for="images" class="font-semibold text-sm">Images</label>
                            <input type="file" name="images" id="images"
                                class="w-full border rounded-md p-1.5">
                            @error('images')
                                <p class="text-red-600 py-1 w-full">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="countries"
                                class="block my-5 md:my-0 mb-2 text-sm font-medium text-gray-900 dark:text-white md:pb-1">Status
                                Product</label>
                            <select id="countries" name="product_status"
                                class="bg-gray-50 border border-gray-300 mb-3 text-gray-900 text-sm rounded-lg focus:ring-blue-500 uppercase focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>{{ $product->product_status }}</option>
                                @if ($product->product_status === 'ready')
                                    <option value="sold">Sold</option>
                                @else
                                    <option value="ready">Ready</option>
                                @endif

                            </select>
                            @error('product_status')
                                <p class="text-red-600 -mt-3 w-full">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="w-full mb-3">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Write your thoughts here..." name="desc_product">{{ $product->desc_product }}</textarea>


                        @error('desc_product')
                            <p class="text-red-600 -mt-3 mb-3 md:mt-0 w-full">{{ $message }}</p>
                        @enderror
                    </div>


                    <button type="submit" class="btn  btn-primary btn-outline w-full my-5">update</button>
                </form>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Fungsi untuk mengatur format Rupiah pada input teks
        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang diinput sudah lebih dari 3 digit
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return rupiah;
        }

        // Fungsi untuk menghapus format Rupiah saat submit form
        function removeFormatRupiah(value) {
            return value.replace(/[^\d]/g, '');
        }

        // Jalankan fungsi format Rupiah saat input berubah
        $(document).on('input', '.rupiah', function() {
            var value = $(this).val();
            var result = formatRupiah(removeFormatRupiah(value));
            $(this).val(result);
        });
    </script>
</body>

</html>
