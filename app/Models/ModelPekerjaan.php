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

	public function user(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

	public function kurir(){
        return $this->belongsTo('App\Models\ModelKurir', 'id_kurir', 'id_kurir');
    }

	public function alamat(){
        return $this->belongsTo('App\Models\ModelAlamat', 'id_alamat', 'id_alamat');
    }

	public function kategori(){
        return $this->belongsTo('App\Models\ModelKategori', 'id_kategori', 'id_kategori');
    }
}
