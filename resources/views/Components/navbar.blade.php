@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    .brand::-webkit-scrollbar {
        display: none;
    }
</style>
@php
    $products = \App\Models\Product::inRandomOrder()->take(4)->get();
    $brand = \App\Models\Brand::take(4)->get();
    if (Auth()->check() && Auth()->user()->level == 'user') {
        $fav = \App\Models\PavProduct::where('id_user', Auth()->user()->id)->get();
    } else {
        $fav = null;
    }
    $navbarClass = Auth()->check() ? 'navbar' : 'fixed';
@endphp

<nav class="px-3 md:px-14 shadow-sm  w-full bg-white duration-300 transition-all z-10 " id="{{ $navbarClass }}">
    <div class="flex justify-between py-4 ">
        <div class="flex gap-5">
            <a href="/">
                <img class="w-10 h-10 " src="{{ asset('storage/images/logo.png') }}" alt="TokoGue">
            </a>
            <button type="button" onclick="searchNav()"
                class="text-lg font-light text-gray-400 mt-2 border-l border-b pl-2 rounded-bl-xl hidden md:flex">
                <svg class="w-4 h-4 mt-1.5 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <p class="ml-1 text-[15px]"> Search by brand and name</p>
            </button>
        </div>
        <div class="flex gap-3 md:gap-5">
            @auth
                <button onclick="searchNav()" type="button" class="md:hidden">
                    <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
                @if (Auth()->user()->level == 'admin' || Auth()->user()->level == 'superadmin')
                @else
                    <div class="relative group">
                        <a href="/orders/dikemas" class="hidden md:flex ">
                            <i class="fa-solid fa-box text-[25px] mt-2  text-primary"></i>
                        </a>
                        <span
                            class="absolute -bottom-10 left-[50%] -translate-x-[50%] bg-black/50 text-white py-1 px-2 rounded hidden group-hover:flex">Orders</span>
                    </div>
                    <div class="relative group">
                        @if (count($fav) == 0)
                            <a href="/favorite">
                                <div class="">
                                    <i class="fa-solid fa-heart text-[25px] mt-2 text-primary"></i>

                                </div>
                            </a>
                        @else
                            <a href="/favorite">
                                <div class="relative ">
                                    <i class="fa-solid fa-heart text-[25px] mt-2 text-primary"></i>
                                    <div
                                        class="absolute -right-2 top-1  bg-red-600 rounded-full px-1.5 text-white border border-white">
                                        <p class="text-sm">{{ count($fav) }}</p>
                                    </div>
                                </div>
                            </a>
                        @endif

                        <span
                            class="absolute -bottom-10 left-[50%] -translate-x-[50%] bg-black/50 text-white py-1 px-2 rounded hidden group-hover:flex">Favorite</span>
                    </div>
                @endif

                <button type="button" onclick="dropDown()">
                    @if (Auth::user()->image)
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/image_user/' . Auth::user()->image) }}"
                            alt="{{ Auth::user()->name }}">
                    @else
                        <img class="w-10 h-10 rounded-full " src="{{ asset('storage/image_user/ppkosong.jpg') }}"
                            alt="user photo">
                    @endif
                </button>
                <div class="absolute top-14 right-5 hidden z-10" id="dropDownMenu">
                    <div class="bg-white rounded-md drop-shadow-md w-[150px]">
                        <ul class="py-2 text-sm text-gray-700 ">
                            @if (Auth()->user()->level == 'admin' || Auth()->user()->level == 'superadmin')
                                <li>
                                    <a href="/dashboard"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                            @endif

                            @if (Auth()->user()->level == 'user')
                                <li>
                                    <a href="/alamat"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Alamat</a>
                                </li>
                                <li class="md:hidden">
                                    <a href="/orders/dikemas"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
                                </li>
                                <li>
                                    <a href="/settings"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                            @endif
                            <li>
                                <form action={{ route('logout') }} method="post"
                                    class="block px-4 py-2 hover:bg-gray-100 ">
                                    @csrf
                                    <button>
                                        Sign out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <div class="flex mt-1.5 md:mt-0">
                    <button onclick="searchNav()" type="button" class="md:hidden mr-3">
                        <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                    <a href="/login"
                        class="btn-sm md:btn-md btn rounded-none border-primary bg-white text-primary hover:bg-white hover:border-primary rounded-tl-xl">
                        Login
                    </a>
                    <a href="/register"
                        class="btn-sm md:btn-md btn rounded-none bg-primary text-white border-primary hover:bg-primary hover:text-white hover:border-primary rounded-br-xl">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<div class="w-full top-0 h-screen bg-black/30 fixed transform transition-transform duration-300 ease-in-out -translate-y-[100vh] z-40"
    id="searchNav">
    <div class="w-full bg-white h-[280px] px-3 md:px-14 py-5">
        <div class="w-full flex justify-between">
            <form class="w-full" id="searchForm" action="{{ route('search') }}">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative border-b border-black">
                    <button class="absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                    <input type="search" id="slugInput"
                        class="w-full p-4 pl-10 border-none focus:ring-0 focus:outline-none" name="q" autofocus
                        autocomplete="off" placeholder="Search by brand and name..." required />
                </div>
            </form>
            <div class="">
                <button type="button" class="uppercase border-l border-black border-b pb-3 pl-2 mt-5"
                    onclick="searchNav()">
                    <i class="fa-solid fa-x px-2 mt-1"></i>
                </button>
            </div>
        </div>
        <div class="flex gap-3 my-3 brand overflow-auto">
            <a href="{{ route('search', ['q']) }}">
                <div class="border border-black p-2">
                    All Product <i class="fa-solid fa-globe"></i>
                </div>
            </a>

            @foreach ($brand as $item)
                <a href="{{ route('search', ['q' => $item->name_brand]) }}">
                    <div class="rounded-md border border-black p-2">
                        {{ $item->name_brand }}
                    </div>
                </a>
            @endforeach
        </div>
        <div>
            <p class="font-mono font-semibold">
                Top Product
                <span class="text-red-600"><i class="fa-solid fa-fire"></i></span>
            </p>
            <div class="my-3 grid grid-rows-2 grid-flow-col gap-4">
                @foreach ($products as $item)
                    <a href="{{ route('search', ['q' => $item->name_product]) }}">
                        <p class="line-clamp-1 cursor-pointer"> {{ $item->name_product }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


<script>
    let prevScrollpos = window.pageYOffset;
    let navbar = document.getElementById("navbar");
    let dropDownMenu = document.getElementById("dropDownMenu");

    window.onscroll = function() {
        let currentScrollPos = window.pageYOffset;

        if (prevScrollpos > currentScrollPos) {
            navbar.style.top = "0";
            navbar.classList.add("fixed");
        } else {
            navbar.style.top = `-${navbar.offsetHeight}px`;
            dropDownMenu.classList.add('hidden')
        }

        if (currentScrollPos === 0) {
            navbar.classList.add('top-0');
            navbar.classList.remove("fixed");
        }

        prevScrollpos = currentScrollPos;
    };




    function searchNav() {
        const navbar = document.getElementById("navbar");
        const searchNav = document.getElementById("searchNav");
        navbar.classList.toggle("hidden");
        searchNav.classList.toggle("-translate-y-[100vh]");
        searchNav.classList.toggle("translate-y-0");
    }

    function dropDown() {
        dropDownMenu.classList.toggle('hidden');
    }

    // Hide dropdown when clicking outside of it
    document.addEventListener('click', function(event) {
        const isClickInsideDropDown = dropDownMenu.contains(event.target);
        const isClickOnDropDownButton = event.target.closest('button[onclick="dropDown()"]');

        if (!isClickInsideDropDown && !isClickOnDropDownButton) {
            dropDownMenu.classList.add('hidden');
        }
    });
</script>
