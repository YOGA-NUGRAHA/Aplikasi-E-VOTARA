<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    use HasFactory;

    protected $fillable = ['no_urut', 'ketua_id', 'wakil1_id', 'wakil2_id', 'image', 'visimisi'];

    // Relasi dengan TabelSiswa untuk ketua, wakil1, wakil2
    public function ketua()
    {
        return $this->belongsTo(TabelSiswa::class, 'ketua_id');
    }

    public function wakil1()
    {
        return $this->belongsTo(TabelSiswa::class, 'wakil1_id');
    }

    public function wakil2()
    {
        return $this->belongsTo(TabelSiswa::class, 'wakil2_id');
    }

    // Relasi dengan Vote
    public function votes()
    {
        return $this->hasMany(Vote::class, 'kandidat_id');
    }
}
