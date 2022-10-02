<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable=["name","accommodation_id","content","email"];
    public function accommodation(){
        return $this->belongsTo("App\Accommodation");
    }
}
