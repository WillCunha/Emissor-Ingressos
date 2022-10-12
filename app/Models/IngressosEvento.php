<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngressosEvento extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingresso_id',
        'evento_id',
        'valor_venda',
        'quantidade_ingressos',
        'quantidade_disponivel',
    ];
}
