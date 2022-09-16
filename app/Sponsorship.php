<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{

    public $fillable = [
    "name",
    "period",
    "price",];

    public function accommodations(){
        return $this->belongsToMany("App\Accommodation");
    }
}
