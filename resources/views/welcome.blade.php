<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="h-[200vh]">

    <div class="flex">
        <div class="w-[65%] bg-white relative">
            <div class="w-full bg-white px-5 py-3 " id="stickyContainer">
                <div class=" w-full">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-0 focus:outline-none focus:border-none "
                            placeholder="Search..." required />

                    </div>
                </div>
            </div>
            <div class="mx-5 bg-gray-50 p-5 rounded">
                <h1 class="font-bold text-xl ">Products</h1>
                <div class="grid grid-cols-3 gap-4 my-4 ">
                    <div class="w-[250px] h-[300px] bg-blue-500 rounded-md">

                    </div>
                    <div class="w-[250px] h-[300px] bg-blue-500 rounded-md">

                    </div>
                    <div class="w-[250px] h-[300px] bg-blue-500 rounded-md">

                    </div>
                </div>
                <button onclick="setItem()">setItem</button>
                <form action={{ route('kasirSave') }} method="post" class="my-10">
                    @csrf
                </form>
                <button onclick="save()">save</button>
            </div>
        </div>
        <div class="w-[35%] bg-yellow-400 fixed right-0">
            <div class="flex p-2 gap-4 items-center">
                <img src="https://i0.wp.com/www.reviewtekno.com/wp-content/uploads/2022/09/pp-wa-kosong-biasa.webp?resize=192%2C192&ssl=1"
                    class="w-14 h-14 rounded-full">
                <h1 class="text-xl font-semibold flex ">John Doe</h1>
            </div>
        </div>


    </div>

    <nav class="fixed bottom-0 w-full">
        <div class="w-full bg-blue-700 grid grid-cols-3">
            <div class="w-full text-white flex justify-center hover:bg-blue-600 p-3">
                Kasir
            </div>
            <div class="w-full text-white flex justify-center hover:bg-blue-600 p-3">
                Product
            </div>
            <div class="w-full text-white flex justify-center hover:bg-blue-600 p-3">
                Member
            </div>
        </div>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var data = [{
                id: 1,
                name: 'product1',
                price: 2000
            },
            {
                id: 2,
                name: 'product2',
                price: 3000
            }
        ];

        function setItem() {
            localStorage.setItem('products', JSON.stringify(data));
        }
        window.addEventListener('scroll', function() {
            var container = document.getElementById('stickyContainer');
            var offset = container.offsetTop;

            if (window.pageYOffset > offset) {
                container.style.position = 'fixed';
                container.style.top = '0';
                container.style.width = '65%';
            } else {
                container.style.position = 'relative';
                container.style.width = '100%';
            }
        });

        var csrf_token = "{{ csrf_token() }}";

        function save() {
            var dataToSend = JSON.parse(localStorage.getItem('keranjang'));

            // Kirim data menggunakan Ajax
            $.ajax({
                route: 'save', // Ganti dengan URL endpoint di Laravel Anda
                type: 'POST',
                data: {
                    _token: csrf_token, // CSRF token
                    data: dataToSend
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
</body>

</html>
