<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $fillable = ['user_id', 'date', 'pengaduan', 'gambar'];
}
