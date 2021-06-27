<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'pekerjaan';

   	protected $primaryKey = 'id_pekerjaan';

   	protected $fillable = [
    	'id_user',
    	'id_alamat',
    	'id_kurir',
        'id_kategori',
    	'harga',
    	'jarak',
    	'berat',
    	'status',
    ];
}
