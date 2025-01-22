<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokoGue - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    @php
        $products = \App\Models\Product::all();
        $brand = \App\Models\Brand::all();
        $order = \App\Models\Orders::where('status_orders', 'dikemas')->get();
    @endphp
    <div class="md:flex">
        @include('./Components/sidebar')
        <div class="md:mx-10 mx-3 md:w-full ">
            <nav class="flex my-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <div
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4  h-4 mr-1 transition duration-75 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            Dashboard
                        </div>
                    </li>
                </ol>
            </nav>
            <div>
                <div class="grid grid-cols-3 gap-5 my-5">
                    <div class="bg-primary/80 w-full h-full rounded-md border hover:bg-primary/90 duration-100 ">
                        <div class="p-5 flex justify-center">
                            <div class="text-center text-white font-bold font-mono">
                                <p>{{ count($products) }}</p>
                                <p>Jumlah Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary/80 w-full h-full rounded-md border hover:bg-primary/90 duration-100 ">
                        <div class="p-5 flex justify-center">
                            <div class="text-center text-white font-bold font-mono">
                                <p>{{ count($brand) }}</p>
                                <p>Jumlah Brand</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary/80 w-full h-full rounded-md border hover:bg-primary/90 duration-100 ">
                        <div class="p-5 flex justify-center">
                            <div class="text-center text-white font-bold font-mono">
                                <p>{{ count($order) }}</p>
                                <p>Pesanan Baru</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button onclick="openModal('tambahSize')" class="btn btn-secondary btn-outline">
                        Tambah Size
                    </button>
                    @if (count($chart) == 0)
                        <div class="h-[50vh] flex items-center justify-center">
                            <p class="font-mono">Tidak ada ukuran</p>
                        </div>
                    @else
                        <div class="grid md:grid-cols-5 grid-cols-3 gap-3 my-5">
                            @foreach ($chart as $item)
                                <div class="flex justify-between border p-4 rounded">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->uk_chart }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-3">
                                                <button onclick="openModal('edit{{ $item->chart_id }}')">
                                                    <i class="fa-regular fa-pen-to-square text-blue-600 text-lg"></i>
                                                </button>
                                                <button onclick="openModal('hapus{{ $item->chart_id }}')">
                                                    <i class="fa-solid fa-trash text-red-600 text-lg"></i>
                                                </button>
                                            </div>

                                            {{-- Modal Edit Size --}}
                                            <div id="edit{{ $item->chart_id }}"
                                                class="hidden fixed left-0 w-full top-0 z-40">
                                                <div
                                                    class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <div
                                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                <h3
                                                                    class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                    Edit Size
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    onclick="closeModal('edit{{ $item->chart_id }}')">
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
                                                                <form action={{ route('editSize') }} method="post">
                                                                    @csrf
                                                                    <input type="number"
                                                                        class="w-full rounded p-3 border"
                                                                        name="uk_chart" value="{{ $item->uk_chart }}">
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->chart_id }}">
                                                                    <button type="submit"
                                                                        class="btn btn-primary w-full my-5">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal Hapus Size --}}
                                            <div id="hapus{{ $item->chart_id }}"
                                                class="hidden fixed left-0 w-full top-0 z-40">
                                                <div
                                                    class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                            <button type="button"
                                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                onclick="closeModal('hapus{{ $item->chart_id }}')">
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
                                                                    Are you sure you want to delete size
                                                                    {{ $item->uk_chart }}?</h3>

                                                                <form action={{ route('hapusSize') }} method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $item->chart_id }}">
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

                                        </td>
                                    </tr>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Size --}}
    <div id="tambahSize" class="hidden fixed left-0 w-full top-0 z-40 ">
        <div class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Tambah Size
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            onclick="closeModal('tambahSize')">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-4 md:p-5 space-y-4">
                        <form action={{ route('size') }} method="post">
                            @csrf
                            <input type="number" class="w-full rounded border p-3" name="uk_chart"
                                placeholder="Add size">
                            <button type="submit" class="btn btn-primary w-full my-5">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
