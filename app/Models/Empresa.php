<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'empresa_id', 'id');
    }
}
