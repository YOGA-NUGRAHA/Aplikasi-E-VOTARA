<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Kandidat;
use App\Models\TabelSiswa;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    function index()
    {
        // Ambil jumlah total siswa dari database
        $totalSiswa = TabelSiswa::count();  
        $totalkandidat = Kandidat::count();  
        $totalvote = Vote::count();  
        $data = Kandidat::with('ketua', 'wakil1', 'wakil2')->get();
        
        // Kirim data jumlah siswa ke view 'admin.index'
        return view('admin.index', compact('totalSiswa', 'totalkandidat', 'totalvote', 'data'));  // Pastikan variabel $totalSiswa dikirimkan ke view
    }
    function siswa(){
        return view('welcome');
        // echo 'ini ceritanya bagian siswa';
        // echo '<h1>'. Auth::user()->name ."</h1>";
        // echo "<a href= '/logout'>logout >></a> ";
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
