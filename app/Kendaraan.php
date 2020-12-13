<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function rentals()
    {
        return $this->belongsTo('App\Rental', 'rental_id');
    }

    public function pemesanans()
    {
        return $this->hasOne('App\Pemesanan');
    }
}
