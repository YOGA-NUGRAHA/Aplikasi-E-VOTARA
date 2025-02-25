<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TabelSiswa extends Model
{
    use HasFactory;

    protected $table = 'tabel_siswas';

    protected $fillable = ['nisn', 'nama', 'jurusan'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($siswa) {
            // Cek apakah user sudah ada berdasarkan nama agar tidak duplikat
            if (!User::where('nama', $siswa->nama)->exists()) {
                User::create([
                    'nama' => $siswa->nama,
                    'password' => Hash::make($siswa->nisn), // NISN sebagai password
                    'role' => 'siswa',
                ]);
            }
        });
    }
}
