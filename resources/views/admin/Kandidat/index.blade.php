<x-sidebar-layout>
    <div class="p-6 bg-gray-100 min-h-screen">
        <!-- Header Section -->
        <div class="bg-gray-900 rounded-lg shadow-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <h3 class="text-xl font-bold text-white mb-4 md:mb-0">Data Kandidat</h3>
                <a href="{{ url('/Kandidat/create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Kandidat
                </a>
            </div>
        </div>
        

        <!-- Table Section -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">No Urut</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Ketua Osis</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Waketu 1</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Calon Waketu 2</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border border-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                        @foreach ($data as $item) 
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">{{$item->no_urut}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                {{$item->ketua->nama}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                {{$item->wakil1->nama}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center border border-gray-200">
                                {{$item->wakil2->nama}}
                            </td>
                                                    
                            <td class="px-6 py-4 whitespace-nowrap border border-gray-200">
                                <div class="flex justify-center space-x-2">
                                    
                                    <form onsubmit="return confirm('apakah anda yakin ingin menghapus data ini?')" action="{{ route('Kandidat.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm transition duration-300 ease-in-out">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-sidebar-layout>