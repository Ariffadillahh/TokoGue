<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('storage/images/logo.png') }}">
    <title>TokoGue - Register</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-14 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Build your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action={{ route('registeraction') }} method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="name" type="text" value="{{ old('name') }}"
                            class="block w-full p-2  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 @error('name') ring-red-600 @enderror">
                    </div>
                    @error('name')
                        <p id="standard_success_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email </label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                            autocomplete="email"
                            class="block w-full  p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 @error('email') ring-red-600 text-red-600 @enderror">
                    </div>
                    @error('email')
                        <p id="standard_success_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="block w-full p-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6 @error('password') ring-red-600 @enderror">
                    </div>
                    @error('password')
                        <p id="standard_success_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <label class="block  text-sm font-medium text-gray-900 dark:text-white" for="file_input">Foto
                    Profile</label>
                <input
                    class="block w-full text-sm text-gray-900 p-2 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 "
                    id="file_input" type="file" name="image">
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Register</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have an account?
                <a href="/login" class="font-semibold leading-6 text-green-600 hover:text-green-500">Login</a>
            </p>
        </div>
    </div>
</body>

</html>
