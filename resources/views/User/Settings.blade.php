<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <title>TokoGue - Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    @php
        $pav = \App\Models\pavProduct::where('id_user', auth()->user()->id)->get();
    @endphp
    @include('./Components/navbar')
    <div class="mx-3 md:mx-14 my-4">
        @if (session('error'))
            <div class="my-3">
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="my-3">
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
        <nav class="flex md:my-10 my-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#969D43] ">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Homepage
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Settings</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="rounded-md bg-gradient-to-r from-primary to-[#C8D439]">
            <div class="p-5 md:flex gap-10 ">

                <div class="flex justify-center mb-5 md:mb-0">
                    <div>
                        @if (Auth::user()->image)
                            <img class="w-[150px] h-[150px] rounded-full"
                                src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <img class="w-[150px] h-[150px] rounded-full"
                                src="{{ asset('storage/image_user/ppkosong.jpg') }}" alt="{{ Auth::user()->name }}">
                        @endif

                        <div class="text-white text-xl mt-5 font-mono">
                            <h1 class="capitalize">{{ Auth::user()->name }}</h1>
                            <h1 class="">{{ Auth::user()->email }}</h1>
                            <a href="/favorite" class="flex gap-2 mt-3 text-sm ">
                                <i class="fa-solid fa-heart text-[20px] text-red-600"></i>
                                <p>{{ count($pav) }}</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="rounded-md border w-full bg-white/10 backdrop-blur-xl ">
                    <div class="grid grid-cols-2">
                        <button
                            class="border-b border-white border-r  bg-white/80 text-primary py-2 rounded-tl-md uppercase font-mono"
                            onclick="general()" id="buttonGeneral">General</button>
                        <button class="border-b border-white  text-white  py-2 rounded-tr-md uppercase font-mono"
                            onclick="password()" id="buttonPassword">Password</button>
                    </div>
                    <div class="p-4">
                        <form action={{ route('settingsGen') }} method="post" id="general"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label class="block mb-2 text-sm font-medium text-white" for="small_size">Foto
                                    Profile</label>
                                <input
                                    class="block w-full mb-3 text-xs border p-3 text-gray-900  border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="small_size" type="file" name="image">
                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-white">Username</label>
                                <input type="text" id="name" name="name"
                                    value="{{ auth()->user()->name }}"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <button class="btn btn-accent btn-sm my-3 w-full text-white">update</button>
                        </form>
                        <form action={{ route('settingsPass') }} method="post" id="password" class="hidden">
                            @csrf
                            <div>
                                <label class="block mb-2 text-sm font-medium text-white" for="pl">Password Lama
                                </label>
                                <input type="password" id="pl" name="pl"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div>
                                <label for="pb" class="block mb-2 text-sm font-medium text-white mt-2">Password
                                    Baru</label>
                                <input type="password" id="pb" name="pb"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <button class="btn btn-accent btn-sm my-3 w-full text-white">update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('./Components/footer')
</body>

</html>
