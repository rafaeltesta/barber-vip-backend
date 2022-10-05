<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Barbeiro extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'barbeiros';

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships
    public function agendamentos()
    {
        $this->hasMany(Agendamento::class, 'barbeiro_id');
    }
}
