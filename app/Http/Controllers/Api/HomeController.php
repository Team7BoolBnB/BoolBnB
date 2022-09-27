<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function sponsorshipData(){
        $sponsorships = Sponsorship::all();

        //Get all the accommodations of logged user
        $user_id = Auth::id();
        
        $accommodations = Accommodation::where("user_id", $user_id)->get();
        
        return response()->json(["accommodations"=>$accommodations,"sponsorships"=>$sponsorships]);
    }
}
