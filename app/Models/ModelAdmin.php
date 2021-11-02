<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;

class ModelAdmin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'nama_admin',
        'password',
        'email',
    ];

    protected $hidden = [
        'password', 'remember_token',
       ];

    public function getAuthPassword()
    {
    return $this->password;
    }
}
