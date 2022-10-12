<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id',
        'ingresso_id',
        'user_id',
        'quantidade',
        'unitario',
        'total',
        'metodo_pgto'
    ];
}
