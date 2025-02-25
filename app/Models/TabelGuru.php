<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabelGuru extends Model
{
    protected $table = 'tabel_gurus';
    protected $fillable = ['nip', 'nama_guru', 'mata_pelajaran'];
}
