<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>TokoGue - Alamat</title>
    <script src="{{ asset('js/script.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('../Components/navbar')
    <div class="mx-3 md:mx-14 min-h-[50vh]">
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
        @if (count($alamat) < 3)
            <div class="flex justify-end mt-2">
                <button onclick="openModal('modalAlamat')" class="btn  rounded  my-2 btn-outline btn-primary">Tambah
                    Alamat</button>
            </div>
        @else
            <p class="text-red-900 my-5 italic">*Alamat hanya bisa 3</p>
        @endif

        <div class="md:grid md:grid-cols-3 gap-4">
            @foreach ($alamat as $item)
                <div class="my-3 md:my-0">
                    <div class="md:gird md:grid-cols-3 gap-4">
                        <div class="border w-full rounded shadow-md border-primary">
                            <div class="p-3">
                                <h1 class="font-mono text-xl">{{ $item->name_penerima }}</h1>
                                <p>{{ $item->no_hp }}</p>
                                <p>{{ Str::limit($item->alamat_detail, 40, '...') }}</p>
                                <div class="flex gap-4 justify-end">
                                    <div>
                                        <button onclick="openModal('edit{{ $item->id_alamat }}')"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-lg"
                                            type="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <button onclick="openModal('hapus{{ $item->id_alamat }}')"
                                            class="text-red-500 text-lg" type="button">
                                            <i class="fa-sharp fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                {{-- Hapus Modal --}}
                                <div id="hapus{{ $item->id_alamat }}" tabindex="-1"
                                    class="hidden fixed left-0 w-full top-0 z-40">
                                    <div
                                        class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                        <div class="relative p-4 w-full max-w-md max-h-full ">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    onclick="closeModal('hapus{{ $item->id_alamat }}')">
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
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Hapus Alamat {{ $item->name_penerima }}?</h3>
                                                    <form action={{ route('hapusAlamat') }} method="post">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $item->id_alamat }}">
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

                                {{-- Modal Update --}}
                                <div id="edit{{ $item->id_alamat }}" tabindex="-1" aria-hidden="true"
                                    class="hidden fixed left-0 w-full top-0 z-40">
                                    <div
                                        class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Update Alamat
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        onclick="closeModal('edit{{ $item->id_alamat }}')">
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
                                                    <form action={{ route('updateAlamat') }} method="post">
                                                        @method('put')
                                                        @csrf
                                                        <div>
                                                            <div class="flex gap-4">
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="namap"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                            Penerima
                                                                        </label>
                                                                        <input type="text" id="namap"
                                                                            name="namap" required
                                                                            value="{{ $item->name_penerima }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="No Handphone"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                                                            Handphone
                                                                        </label>
                                                                        <input type="number" id="No Handphone"
                                                                            name="nohp" required
                                                                            value="{{ $item->no_hp }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex gap-4 my-3">
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="Provinsi"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi
                                                                        </label>
                                                                        <input type="text" id="Provinsi"
                                                                            name="provinsi" required
                                                                            value="{{ $item->name_provinsi }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="Kota"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota
                                                                        </label>
                                                                        <input type="text" id="Kota"
                                                                            name="kota" required
                                                                            value="{{ $item->name_kota }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex gap-4 mb-3">
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="Kecamatan"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                                        <input type="text" id="Kecamatan"
                                                                            name="kecamatan" required
                                                                            value="{{ $item->name_kecamatan }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                                <div class="w-full">
                                                                    <div>
                                                                        <label for="Kelurahan"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan
                                                                        </label>
                                                                        <input type="text" id="Kelurahan"
                                                                            name="kelurahan" required
                                                                            value="{{ $item->name_kelurahan }}"
                                                                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id_alamat }}">
                                                            <label for="message"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                                                Detail</label>
                                                            <textarea id="message" rows="4"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                name="alamatDetail" required>{{ $item->alamat_detail }}</textarea>
                                                            <button class="btn btn-success w-full my-3">update
                                                                alamat</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach


        </div>
        @if (count($alamat) == 0)
            <div class="h-[50vh] flex items-center justify-center w-full">
                <h1 class="text-xl  font-mono ">Alamat tidak ada</h1>
            </div>
        @endif

        {{-- Modal tambah alamat --}}
        <div id="modalAlamat" tabindex="-1" aria-hidden="true" class="hidden fixed left-0 w-full top-0 z-40">
            <div class="w-full h-screen flex justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Tambah Alamat
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                onclick="closeModal('modalAlamat')">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <form action={{ route('addAlamat') }} method="post">
                                @csrf
                                <div>
                                    <div class="flex gap-4">
                                        <div class="w-full">
                                            <div>
                                                <label for="namap"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                    Penerima
                                                </label>
                                                <input type="text" id="namap" name="namap" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div>
                                                <label for="No Handphone"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                                    Handphone
                                                </label>
                                                <input type="number" id="No Handphone" name="nohp" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 my-3">
                                        <div class="w-full">
                                            <div>
                                                <label for="Provinsi"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi
                                                </label>
                                                <input type="text" id="Provinsi" name="provinsi" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div>
                                                <label for="Kota"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota
                                                </label>
                                                <input type="text" id="Kota" name="kota" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 mb-3">
                                        <div class="w-full">
                                            <div>
                                                <label for="Kecamatan"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                <input type="text" id="Kecamatan" name="kecamatan" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                        <div class="w-full">
                                            <div>
                                                <label for="Kelurahan"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan
                                                </label>
                                                <input type="text" id="Kelurahan" name="kelurahan" required
                                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                        </div>
                                    </div>

                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                        Detail</label>
                                    <textarea id="message" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="RT/RW No Rumah..." name="alamatDetail" required></textarea>
                                    <button class="btn btn-success w-full my-3">Tambah alamat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('../Components/footer')
</body>

</html>
