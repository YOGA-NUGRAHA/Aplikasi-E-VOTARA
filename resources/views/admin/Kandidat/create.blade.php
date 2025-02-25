<x-sidebar-layout>
    <div class="w-full  bg-white shadow-lg rounded-lg p-6">
        <div class="bg-gray-900 text-white font-bold text-lg p-4 rounded-t-lg">
            Tambah Calon Ketua Dan Wakil Osis
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
            <form action="{{ url('Kandidat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="no_urut" class="block text-gray-700 font-semibold">no urut</label>
                    <input type="text" id="no_urut" name="no_urut" placeholder="Masukan no_urut Siswa"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="nisn" class="block text-gray-700 font-semibold">Calon Ketua Osis</label>
                    <select name="ketua" id="ketua"
                        class="m w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 ">
                        <option value="">-- Pilih Ketua OSIS --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">wakil 1</label>
                    <select name="wakil1" id="wakil1"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Wakil 1 --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}" {{ old('wakil1') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">wakil 2</label>
                    <select name="wakil2" id="wakil2"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Wakil 2 --</option>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}" {{ old('wakil2') == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-4">
                    <label class="font-weight-bold">Foto</label>
                    <input type="file"
                        class="form-control @error('image') is-invalid @enderror w-full border-gray-300 rounded-md"
                        name="image">

                    @error('image')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 font-semibold">Visi Dan Misi</label>
                    <textarea name="visimisi" class=" w-full" rows="5" placeholder="Masukkan Visi Misi">{{ old('visimisi') }}</textarea>

                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>



    <script>
        CKEDITOR.replace('visimisi');
    </script>

    </x-sidebar>
