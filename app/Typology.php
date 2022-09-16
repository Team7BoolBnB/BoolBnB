<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    public function accommodations(){
        return $this->hasMany("App\Accommodation");
    }
}
