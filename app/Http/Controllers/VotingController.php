<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    /**
     * Menampilkan opsi voting (kandidat)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua kandidat dengan menghitung jumlah suara masing-masing
        $data = Kandidat::withCount('votes')->get();  // Menggunakan withCount untuk menghitung jumlah suara

        // Menghitung total suara untuk perhitungan persentase (optional, jika ingin menampilkan persentase)
        $totalVotes = Vote::count(); // Hitung jumlah suara total untuk digunakan dalam perhitungan persentase

        // Pass data ke view
        return view('welcome', compact('data', 'totalVotes'));
    }

    /**
     * Menyimpan suara yang baru dibuat ke database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Cek apakah user sudah memberikan suara
        if (Vote::where('user_id', auth()->id())->exists()) {
            return redirect()->back()->with('error', 'Anda sudah memberikan suara.');
        }

        // Validasi kandidat_id
        $request->validate([
            'kandidat_id' => 'required|exists:kandidats,id',
        ]);

        // Simpan suara di database
        Vote::create([
            'user_id' => auth()->id(),
            'kandidat_id' => $request->kandidat_id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('welcome')->with('success', 'Terima kasih telah memberikan suara.');
    }
}
