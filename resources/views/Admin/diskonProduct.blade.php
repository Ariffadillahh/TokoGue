<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>TokoGue - Diskon Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="md:flex">
        @include('./Components/sidebar')
        <div class="md:mx-10 mx-3 md:w-full my-5">
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
                            <p
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                Diskon</p>
                        </div>
                    </li>

                </ol>
            </nav>
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
            @if (session('success'))
                <div class="mt-5">
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <form action={{ route('addDiskon') }} method="post">
                @csrf
                <div>
                    <label for="product" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                    </label>
                    <select id="product" name="product"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Product</option>
                        @foreach ($product as $item)
                            <option value="{{ $item->id_product }}">{{ $item->name_product }}</option>
                        @endforeach
                        @if (count($product) === 0)
                            <option disabled>Tidak ada Product</option>
                        @endif
                    </select>

                </div>
                <div class="w-full flex gap-4 my-5">
                    <div class="w-full">
                        <label for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon
                        </label>
                        <input type="number" id="small-input"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Dalam Bentuk Persen" name="diskon">
                    </div>
                    <div class="w-full">
                        <label for="small-input"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai Tanggal
                        </label>
                        <input type="date" id="small-input" name="tgl"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 ">
                    </div>
                </div>

                <button class="w-full btn-secondary p-2 btn">Tambah Diskon</button>
            </form>
            <div class="my-5">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Persent Diskon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Product
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Sampai Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @foreach ($diskon as $item)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name_product }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->persen_diskon }}%
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="line-through"> Rp.
                                            {{ number_format($item->price_product, 0, ',', '.') }}</p>
                                    </td>

                                    <td class="px-6 py-4">
                                        Rp. {{ number_format($item->total_harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tanggal_berlaku }}
                                    </td>
                                    <td class="px-6 py-4 ">
                                        <div class="flex gap-4">
                                            <div>
                                                <button onclick="openModal('edit{{ $item->id_diskon }}')">
                                                    <i
                                                        class="fa-regular fa-pen-to-square text-blue-600 text-lg mt-1"></i>
                                                </button>
                                                <div id="edit{{ $item->id_diskon }}"
                                                    class="hidden fixed left-0 w-full top-0 z-40">
                                                    <div
                                                        class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <div
                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3
                                                                    class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                    Edit Diskon
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    onclick="closeModal('edit{{ $item->id_diskon }}')">
                                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>

                                                            <div class="p-4 md:p-5 space-y-4">
                                                                <form action={{ route('editDiskon') }} method="post">
                                                                    @csrf
                                                                    <label for="diskon"
                                                                        class="font-semibold">Persent Diskon %</label>
                                                                    <input type="text" name="diskon"
                                                                        id="diskon"
                                                                        class="w-full rounded border p-3"
                                                                        value="{{ $item->persen_diskon }}">
                                                                    <div class="mt-3">
                                                                        <label for="diskon"
                                                                            class="font-semibold">Sampai
                                                                            Tanggal</label>
                                                                        <input type="date"
                                                                            class="w-full border p-2" name="date">
                                                                        <p class="mt-0.5">Tanggal sebelumnya :
                                                                            {{ $item->tanggal_berlaku }}</p>
                                                                    </div>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id_diskon }}">
                                                                    <input type="hidden" name="id_product"
                                                                        value="{{ $item->id_product }}">
                                                                    <div class="my-2">
                                                                        <label for="sts"
                                                                            class="font-semibold">Status</label>
                                                                        <select name="status" id="sts"
                                                                            class="w-full p-1 border">
                                                                            <option class="capitalize">
                                                                                {{ $item->status }}
                                                                            </option>
                                                                            @if ($item->status === 'active')
                                                                                <option value="expired">Expired
                                                                                </option>
                                                                            @else
                                                                                <option value="active">Active
                                                                                </option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <button
                                                                        class="btn btn-primary w-full my-4">Update</button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button onclick="openModal('{{ $item->id_diskon }}')"
                                                    class="text-red-500 text-lg" type="button">
                                                    <i class="fa-sharp fa-solid fa-trash"></i>
                                                </button>
                                                <div id="{{ $item->id_diskon }}" tabindex="-1"
                                                    class="hidden fixed left-0 w-full top-0 z-40">
                                                    <div
                                                        class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                onclick="closeModal({{ $item->id_diskon }})">
                                                                <svg class="w-3 h-3" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-4 md:p-5 text-center">
                                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                </svg>
                                                                <h3
                                                                    class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                    Are you sure you want to delete
                                                                    {{ Str::limit($item->name_product, 12, '...') }}
                                                                    ?</h3>
                                                                <form action={{ route('hapusDiskon') }}
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->id_diskon }}">
                                                                    <button type="submit"
                                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
