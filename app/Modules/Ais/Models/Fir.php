<?php

namespace App\Modules\Ais\Models;

use App\Models\aModel;

class Fir extends aModel {

    protected $table = "ais_fir";
    protected $fillable = [
        "icao", "name",
    ];

    public function airfields(){
        return $this->hasMany(Aerodrome::class);
    }

    public function sectors(){
        return $this->hasMany(Fir\Sector::class);
    }
}