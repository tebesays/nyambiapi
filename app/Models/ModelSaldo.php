<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSaldo extends Model
{
    use HasFactory;

    protected $table = 'cairkan_saldo';
    protected $primaryKey = 'id_cairkansaldo';
}
