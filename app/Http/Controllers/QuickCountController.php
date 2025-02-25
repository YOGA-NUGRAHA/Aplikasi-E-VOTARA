<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Kandidat;
use App\Models\TabelSiswa;

class QuickCountController extends Controller
{
    function index()
    {
    $data = Kandidat::all();
    $candidates = Kandidat::withCount('votes')->get();
    $siswa = TabelSiswa::all();
    return view('admin.QuickCount.index', compact('data', 'candidates' , 'siswa'));
}

    
}
