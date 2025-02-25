<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\TabelSiswa;
use App\Models\Vote;
use Illuminate\Http\Request;

class TabelSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil data jurusan untuk dropdown filter
    $jurusans = TabelSiswa::select('jurusan')->distinct()->get();

    $data = TabelSiswa::orderBy('nisn', 'desc');
    // Jika ingin tetap memakai request parameter, bisa menggunakan global request
    if (request()->has('jurusan') && request()->jurusan != '') {
        $data = $data->where('jurusan', request()->jurusan);
    }
    $data = $data->paginate(10);

    foreach ($data as $item) {
        $item->hasVoted = Vote::where('user_id', auth()->id())
            ->where('kandidat_id', $item->nisn)
            ->exists();
    }

    return view('admin.TabelSiswa.index', compact('data', 'jurusans'));
}


    
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.TabelSiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dan simpan data siswa
        $request->validate([
            'nisn' => 'required|numeric|unique:tabel_siswas,nisn',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        TabelSiswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->to('admin/TabelSiswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TabelSiswa $id)
    {
        // Menampilkan data kandidat untuk siswa yang dipilih (nisn)
        $data = Kandidat::findOrFail($id);

        return view('Kandidat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = TabelSiswa::where('nisn', $id)->first();
        return view('admin.TabelSiswa.edit')->with('data', $data);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        TabelSiswa::where('nisn', $id)->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->to('admin/TabelSiswa')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TabelSiswa::where('nisn', $id)->delete();
        return redirect()->to('admin/TabelSiswa')->with('success', 'Data berhasil dihapus');
    }
}
