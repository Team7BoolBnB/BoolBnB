<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{

    public $fillable = [
    "address",
    "slug",
    "user_id",
    "typology_id",
    "longitude",
    "latitude",
    "title",
    "description",
    "rooms",
    "beds",
    "bathrooms",
    "mt_square",
    "image",
    "available"];
 //la madonna di laravel decide di testa sua internamente come cazzo creare la tabella pivot...a database la salvavamo 
 //sponsorship_accommodation ma lui internamente non ne voleva sentire e lasciava come tabella in memoria accommodation_sponsorship
 // aggiungendo dopo belongs to many la tabella che vogliamo lui la sovrascrive in memoria d usa quella che gli diciamo...dio assassino
    public function sponsorship(){
        return $this->belongsToMany("App\Sponsorship",'sponsorship_accommodation')->withPivot("endTime","startTime");
    }
    public function services(){
        return $this->belongsToMany("App\Service",'service_accommodation');
    }
    public function views(){
        return $this->hasMany("App\View");
    }
    public function messages(){
        return $this->hasMany("App\Message");
    }
    public function typology(){
        return $this->belongsTo("App\Typology");
    }
    
    public function user(){
        return $this->belongsTo("App\User");
    }
    

}
