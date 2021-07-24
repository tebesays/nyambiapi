<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAlamat extends Model
{
    use HasFactory;

    protected $table = 'alamat_penerima';
    protected $primaryKey = 'id_alamat';
}
