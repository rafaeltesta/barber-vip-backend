<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'barber_id', 'cliente_id'
    ];

    protected $date = [
        'data'
    ];

    //Relationships
    public function cliente()
    {
        $this->belongsTo(Cliente::class);
    }

    public function barbeiro()
    {
        $this->belongsTo(Barbeiro::class);
    }
}
