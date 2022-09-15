<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public function views(){
        return $this->hasMany("App\View");
    }
    public function messages(){
        return $this->hasMany("App\Message");
    }
    public function typology(){
        return $this->belongsTo("App\Typology");
    }
    public function services(){
        return $this->belongsToMany("App\Service");
    }
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function sponsorships(){
        return $this->belongsToMany("App\Sponsorship");
    }

}
