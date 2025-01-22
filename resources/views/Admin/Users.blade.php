<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TokoGue - Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <div class="md:flex">
        @include('./Components/sidebar')
        <div class="md:mx-10 mx-3 md:w-full ">

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

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Users</span>
                        </div>
                    </li>
                </ol>
            </nav>
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
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <div>
                <form action={{ route('addUser') }} method="post">
                    @csrf
                    <div>
                        <label for="email" class="font-light  text-lg">Email</label>
                        <input id="email" type="text" class="border p-1 w-full mt-1" name="email">
                    </div>
                    <div class="my-3">
                        <label for="username" class="font-light  text-lg">Username</label>
                        <input id="username" type="text" class="border p-1 w-full mt-1" name="name">
                    </div>
                    <div>
                        <label for="password" class="font-light  text-lg">Password</label>
                        <input id="passsword" type="password" class="border p-1 w-full mt-1" name="password">
                    </div>
                    <div class="my-3">
                        <label for="role" class="font-light  text-lg">Role</label>
                        <select name="role" id="role" class="border w-full p-1.5">
                            <option selected>PILIH</option>
                            <option value="admin">Admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <button class="btn btn-primary w-full">Tambah</button>
                </form>
            </div>
            <div>
                @foreach ($user as $item)
                    <div class="flex justify-between border my-5 p-3 rounded">
                        <p>{{ $item->name }}</p>
                        <P class="capitalize">{{ $item->level }}</P>
                    </div>
                    <div class="hidden fixed left-0 w-full top-0 z-40 " id="modal{{ $item->id }}">
                        <div class="w-full h-screen flex px-5 justify-center pt-8 md:pt-0 md:items-center bg-black/30">
                            <div
                                class="md:max-w-[50%] w-full max-h-[70vh] overflow-auto bg-white rounded-md p-3 md:p-5 shadow-md">
                                <div class="flex justify-between border-b pb-3">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modalTitle">
                                        Terms of Service {{ $item->name }}
                                    </h3>
                                    <button type="button" onclick="closeModal('modal{{ $item->id }}')"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="p-4 md:p-5 space-y-4">
                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                        With less than a month to go before the European Union enacts new
                                        consumer privacy laws for its citizens, companies around the world
                                        are updating their terms of service agreements to comply.
                                    </p>

                                    <p id="modalIdValue"></p> <!-- Element untuk menampilkan nilai modalId -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>



    <script></script>
</body>

</html>
