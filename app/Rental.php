<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    // public function kendaraans(){
    //     return $this->hasMany(Kendaraan::class);
    // }
    public function kendaraans()
    {
        return $this->hasOne('App\Kendaraan');
    }
}
