<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKurir extends Model
{
    use HasFactory;

    protected $table = 'kurir';
    protected $primaryKey = 'id_kurir';

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
