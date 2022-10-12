<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomeEvento',
        'local',
        'empresa_id',
        'descricao',
        'imagem',
        'data'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
