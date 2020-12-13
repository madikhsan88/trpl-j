<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public function kendaraans()
    {
        return $this->belongsTo('App\Kendaraan', 'id_kendaraan');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
