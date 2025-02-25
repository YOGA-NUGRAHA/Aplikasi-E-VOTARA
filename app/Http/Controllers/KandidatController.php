<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\TabelSiswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kandidat::with(['ketua', 'wakil1', 'wakil2'])->paginate(10);
        return view('admin.Kandidat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = TabelSiswa::orderBy('nama', 'asc')->get();
        return view('admin.Kandidat.create', compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_urut' => 'required',
            'ketua' => 'nullable',
            'wakil1' => 'nullable',
            'wakil2' => 'nullable',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'visimisi' => 'required|min:10',
        ]);

        // Ambil file gambar
        $image = $request->file('image');
        $imagePath = $image->store('images', 'public');

        // Simpan data ke database
        Kandidat::create([
            'no_urut' => $request->no_urut,
            'ketua_id' => $request->ketua,
            'wakil1_id' => $request->wakil1,
            'wakil2_id' => $request->wakil2,
            'image' => $imagePath,
            'visimisi' => $request->visimisi,
        ]);

        return redirect()->route('admin.Kandidat.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Kandidat::with(['ketua', 'wakil1', 'wakil2'])->find($id);

        if (!$data) {
            return redirect()->route('kandidat.index')->with('error', 'Data tidak ditemukan!');
        }

        return view('admin.Kandidat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $siswas = TabelSiswa::orderBy('nama', 'asc')->get();  // Ambil semua siswa untuk dropdown
        return view('admin.Kandidat.edit', compact('kandidat', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        $request->validate([
            'no_urut' => 'required',
            'ketua' => 'required',
            'wakil1' => 'required',
            'wakil2' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:5120',
            'visimisi' => 'required|min:10',
        ]);

        // Update kandidat
        $kandidat->no_urut = $request->no_urut;
        $kandidat->ketua_id = $request->ketua;
        $kandidat->wakil1_id = $request->wakil1;
        $kandidat->wakil2_id = $request->wakil2;
        $kandidat->visimisi = $request->visimisi;

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($kandidat->image) {
                Storage::delete('public/' . $kandidat->image);
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $kandidat->image = $imagePath;
        }

        $kandidat->save();  // Simpan perubahan

        return redirect()->route('admin.Kandidat.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kandidat::where('id', $id)->delete();
        return redirect()->to('Kandidat')->with('success', 'Data berhasil dihapus');
    }
}
