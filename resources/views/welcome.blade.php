<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    @vite('resources/css/app.css')
    @include('sweetalert::alert')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" crossorigin="anonymous"></script>

    <style>
        @media (max-width: 768px) {
            #nav-content {
                display: none;
            }

            #nav-toggle:checked + #nav-content {
                display: block;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200">

    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">
        <div class="container mx-auto flex flex-wrap items-center justify-between mt-0 py-3">
            <a href="#" class="text-blue-700 ml-4 text-xl font-bold no-underline hover:no-underline">E - Votara</a>

            <!-- Hamburger Menu Toggle for Mobile -->
            <input type="checkbox" id="nav-toggle" class="hidden">
            <label for="nav-toggle" class="block md:hidden px-2 text-gray-600 hover:text-gray-900 focus:outline-none">
                <i class="fas fa-bars"></i>
            </label>

            <!-- Navigation Links -->
            <div class="hidden w-full md:flex md:items-center md:w-auto" id="nav-content">
                <ul class="list-reset flex flex-col md:flex-row items-start md:ml-4">
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#" class="block py-1 md:py-3 text-blue-700 no-underline hover:text-gray-900 border-b-2 border-orange-600">
                            <i class="fas fa-home fa-fw mr-3"></i><span class="text-sm">Home</span>
                        </a>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="#kandidat" class="block py-1 md:py-3 text-gray-500 no-underline hover:text-gray-900 hover:border-pink-500">
                            <i class="fas fa-tasks fa-fw mr-3"></i><span class="text-sm">Kandidat</span>
                        </a>
                    </li>
                    </li>
                    <li class="mr-6 my-2 md:my-0">
                        <a href="logout" class="block py-1 md:py-3 text-gray-500 no-underline hover:text-gray-900 hover:border-purple-500">
                            <i class="fas fa-sign-out-alt fa-fw mr-3"></i><span class="text-sm">Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Grid layout for 3 columns with margin-top adjustment -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-24 px-4">
        @foreach ($data as $candidate)
            <div id="kandidat" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                <div class="card-image">
                    <img src="{{ asset('storage/' . $candidate->image) }}" alt="Candidate Image" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" />
                </div>
                <div class="card-content p-6">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-4 rounded-t-xl text-center">
                        <span class="text-xl font-bold">No Urut {{ $candidate->no_urut }}</span>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mt-4">{{ $candidate->ketua->nama }} & {{ $candidate->wakil1->nama }} & {{ $candidate->wakil2->nama }}</h3>
                    <p class="text-gray-600 text-base mt-2 mb-4">Visi & Misi: <br> {{ $candidate->visimisi }}</p>
                    <div class="flex gap-4 justify-between">
                        <form action="{{ route('vote.store') }}" method="POST">
                            @csrf
                            <button type="button" data-modal-target="#visiMisiModal{{ $candidate->id }}" class="bg-gray-100 hover:bg-gray-200 px-5 py-2.5 text-gray-700 rounded-lg border border-gray-200">Detail</button>
                            <input type="hidden" name="kandidat_id" value="{{ $candidate->id }}">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-2.5 rounded-lg {{ auth()->user()->hasVoted() ? 'opacity-50 cursor-not-allowed' : '' }}">
                                {{ auth()->user()->hasVoted() ? 'Sudah Vote' : 'Vote' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- tampilan detail -->
            <dialog id="visiMisiModal{{ $candidate->id }}" class="rounded-xl shadow-2xl max-w-3xl w-full bg-white backdrop-blur-md">
                <div class="p-8">
                    <div class="bg-blue-600 text-white p-6 rounded-t-xl">
                        <h3 class="font-bold text-2xl">Visi & Misi</h3>
                        <p class="mt-2">Kandidat Nomor Urut {{ $candidate->no_urut }}</p>
                    </div>
                    <div class="p-6 bg-blue-50 rounded-lg mt-4">
                        <h4 class="font-semibold text-blue-800 mb-2">{{ $candidate->visimisi }}</h4>
                    </div>
                    <div class="mt-6 flex justify-end gap-4">
                        <button type="button" data-modal-close class="bg-gray-100 hover:bg-gray-200 px-6 py-2.5 text-gray-700 rounded-lg border border-gray-200">Tutup</button>
                    </div>
                </div>
            </dialog>
        @endforeach
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Membuka modal
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-target'); 
                    const modal = document.querySelector(modalId);
                    if (modal) {
                        modal.showModal(); // Membuka modal
                    }
                });
            });
    
            // Menutup modal
            document.querySelectorAll('[data-modal-close]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('dialog');
                    if (modal) {
                        modal.close(); // Menutup modal
                    }
                });
            });
        });
    </script>
    
@if(session('success'))
    <script>
        Swal.fire({
            title: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    </script>
@endif



@include('sweetalert::alert')

</body>

</html>
