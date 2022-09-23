<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $accommodations = Accommodation::all();


        $sponsorized = [];

        for ($i=0; $i < count($accommodations); $i++) { 
            if (count($accommodations[$i]->sponsorship) > 0) {
                $sponsorized[]=$accommodations[$i];
                
            }
        }
        

        

        return response()->json($sponsorized);
        


    }
}
