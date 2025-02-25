<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Vote;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['nama', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];




public function hasVoted()
{
    return Vote::where('user_id', $this->id)->exists();
}

}
