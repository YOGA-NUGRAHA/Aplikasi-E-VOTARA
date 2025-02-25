<x-sidebar-layout>
    <div class="w-full  bg-white shadow-lg rounded-lg p-6">
        <div class="bg-gray-900 text-white font-bold text-lg p-4 rounded-t-lg">
            Tambah Siswa
        </div>

        @if ($errors->any())
                <div class="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                 
        <div class="p-6 ">
            <form action="{{url ('admin/TabelSiswa')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="nisn" class="block text-gray-700 font-semibold">NISN</label>
                    <input type="text" id="nisn" name="nisn" placeholder="Masukan NISN Siswa"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">NAMA LENGKAP SISWA</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukan Nama Lengkap"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="jurusan" class="block text-gray-700 font-semibold">Jurusan</label>
                    {{-- <input type="text" id="jurusan" name="jurusan" placeholder="Masukan jurusan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"> --}}
                        <select name="jurusan" id="jurusan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                            <option value="RPL">RPL</option>
                            <option value="Kimia">Kimia</option>
                            <option value="Elektronika">Elektronika</option>
                            <option value="Las">Las</option>
                            <option value="Mesin">Mesin</option>
                        </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-sidebar>