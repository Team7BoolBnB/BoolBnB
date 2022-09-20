<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function accommodations(){
        return $this->belongsToMany("App\Accommodation",'service_accommodation');
    }
}
