<x-sidebar-layout>
    <!-- Main Content Area -->
    <div class="lg:ml-[10px] transition-all duration-1000 p-6">
        <!-- Statistics Panel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-blue-600 p-6 rounded-lg text-white text-center shadow-lg">
                <h3 class="text-lg font-semibold">Total Siswa</h3>
                <p class="text-2xl font-bold">{{ $totalSiswa }}</p>
            </div>

            <div class="bg-green-600 p-6 rounded-lg text-white text-center shadow-lg">
                <h3 class="text-lg font-semibold">Total Kandidat</h3>
                <p class="text-2xl font-bold">{{ $totalkandidat }}</p> 
            </div>

            <div class="bg-orange-600 p-6 rounded-lg text-white text-center shadow-lg">
                <h3 class="text-lg font-semibold">Total Vote</h3>
                <p class="text-2xl font-bold">{{ $totalvote }}</p> 
            </div>
        </div>

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

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Membuka modal saat tombol 'Detail' diklik
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-target'); // Mendapatkan ID modal
                    const modal = document.querySelector(modalId); // Mencari modal berdasarkan ID
                    if (modal) {
                        modal.showModal(); // Membuka modal
                    }
                });
            });

            // Menutup modal saat tombol 'Tutup' diklik
            document.querySelectorAll('[data-modal-close]').forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('dialog'); // Mencari elemen dialog terdekat
                    if (modal) {
                        modal.close(); // Menutup modal
                    }
                });
            });
        });
    </script>
</x-sidebar-layout>
