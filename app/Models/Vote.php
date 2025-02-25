<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kandidat_id',  // Gantilah nama kolom ini dengan kandidat_id untuk menyelaraskan dengan tabel
    ];

    // Relasi Vote dengan Kandidat
    public function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id'); // pastikan ini sesuai dengan kolom foreign key
    }
}
