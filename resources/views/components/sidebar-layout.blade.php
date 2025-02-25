<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

</head>

<body class=" font-[Poppins]">
    <!-- Mobile menu button -->
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer lg:hidden" onclick="Openbar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000
        p-2 w-[300px] overflow-y-auto text-center bg-gray-900 shadow h-screen">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center rounded-md">
                <img src="{{asset('image/logo vote.png')}}" class="w-10 h-10">
                <h1 class="text-[15px] ml-3 text-xl text-gray-200 font-bold">Dashboard Admin</h1>
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
            </div>
            <hr class="my-2 text-gray-600">

            <div>

                <a href="{{ url('admin') }}">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600
                        {{ Request::is('admin') ? 'bg-gray-800' : '' }}">
                        <img src="{{asset('image/iconHome.png')}}" class="w-7 h-7">
                        <span class="text-[15px] ml-4 text-gray-200">Home</span>
                    </div>
                </a>

                <a href="{{ url('admin/TabelSiswa') }}">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600
                        {{ Request::is('admin/TabelSiswa*') ? 'bg-gray-800' : '' }}">
                        <img src="{{asset('image/iconTable.png')}}" class="w-7 h-7">
                        <span class="text-[15px] ml-4 text-gray-200">Tabel Siswa</span>
                    </div>
                </a>
                
                <a href="{{ url('admin/Kandidat') }}">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600
                        {{ Request::is('admin/Kandidat*') ? 'bg-gray-800' : '' }}">
                        <img src="{{asset('image/iconKandidat.png')}}" class="w-7 h-7">
                        <span class="text-[15px] ml-4 text-gray-200">Kandidat</span>
                    </div>
                </a>

                <a href="{{ url('admin/quickcount') }}">
                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600
                        {{ Request::is('admin/quickcount*') ? 'bg-gray-800' : '' }}">
                        <img src="{{asset('image/chart bar.png')}}" class="w-7 h-7">
                        <span class="text-[15px] ml-4 text-gray-200">Hasil Suara</span>
                    </div>
                </a>

                <hr class="my-4 text-gray-600">

                <a href="/logout">
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-gray-600">
                    <img src="{{asset('image/iconLogout.png')}}" class="w-7 h-7">
                    <span class="text-[15px] ml-4 text-gray-200">Logout</span>
                </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="lg:ml-[300px] transition-all duration-1000">
        {{$slot}}
    </div>

    <script>
        function Openbar() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]')
        }
    </script>
    @include('sweetalert::alert')

</body>

</html>
