<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
    @include('sweetalert::alert')



</head>

<body class="bg-white flex flex-col items-center justify-center min-h-screen py-12">

    <div class="bg-white rounded-xl p-8 mb-8 w-full max-w-6xl">
        <!-- Title Section - Text preserved -->
        <h1 class="text-3xl font-bold text-center text-gray-900 mb-2">
            Cara pemilihan ketua osis
        </h1>
        <p class="text-center text-gray-600 mb-12">
            Ikuti langkah-langkah berikut untuk berpartisipasi dalam pemilihan ketua Osis / MPK
        </p>

        <!-- Grid Container - New card layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Step 1 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-lg font-bold text-white">01</span>
                    </div>
                    <div class="ml-3 flex-1 border-b border-blue-100"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Login</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Masuk menggunakan Nama Lengkap dan password (NISN) yang anda punya.
                </p>
            </div>

            <!-- Step 2 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-lg font-bold text-white">02</span>
                    </div>
                    <div class="ml-3 flex-1 border-b border-blue-100"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pilih Kandidat</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Lihat profil dan visi misi dari setiap kandidat ketua kelas yang tersedia untuk dipilih.
                </p>
            </div>

            <!-- Step 3 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-lg font-bold text-white">03</span>
                    </div>
                    <div class="ml-3 flex-1 border-b border-blue-100"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Proses Voting</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Pilih satu kandidat dengan mengklik tombol voting pada kartu kandidat yang ingin anda pilih.
                </p>
            </div>

            <!-- Step 4 -->
            <div
                class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 hover:shadow-lg transition-shadow">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-lg font-bold text-white">04</span>
                    </div>
                    <div class="ml-3 flex-1 border-b border-blue-100"></div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Suara</h3>
                <p class="text-gray-600 leading-relaxed text-sm">
                    Periksa kembali pilihan Anda dan konfirmasi. Setelah dikonfirmasi, suara anda akan langsung
                    tercatat.
                </p>
            </div>
        </div>
    </div>

    <div
        class="bg-white bg-opacity-90 shadow-2xl rounded-xl p-8 max-w-sm w-full @if (!$errors->any()) slide-in-top @endif">
        <!-- Logo -->
        <div class="flex justify-center mb-6 mt-6">
            <img src="{{ asset('image/logo vote.png') }}" alt="Logo" class="w-20 h-20">
        </div>

        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-4">Login</h2>

        <!-- Form -->
        <form action="/" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="username" name="nama" placeholder="Masukan Nama Lengkap"
                    value="{{ old('nama') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div class="mb-5">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukan Nisn Anda "
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-700 hover:scale-105 transform transition duration-300">
                Login
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-gray-500 mt-4 text-sm">
            © 2025 Mochamad Yoga Trinugraha
        </p>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success' , 'berhasil kweluadih') }}", 
                icon: 'success',
                confirmButtonText: 'Oke'
            });
        </script>
    @endif
    @include('sweetalert::alert')

</body>

</html>
