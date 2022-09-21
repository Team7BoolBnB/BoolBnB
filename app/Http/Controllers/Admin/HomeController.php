<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id=Auth::id();

        $active = null;

        $accommodations = Accommodation::where("user_id",$user_id)->orderBy("created_at", "desc")->get()->take(2);

        /*  $data = [];

        if(count($accommodations) >= 2) {

            for($i = 0; $i <= 1; $i++) {
                $data[] = $accommodations[$i];
            }

        } else {
            for($i = 0; $i <= count($accommodations) -1; $i++) {
                $data[] = $accommodations[$i];
            }
        }
        
        $accommodations = $data; */

        if(count($accommodations) == 0) {
            $visible = false;
        } else {
            $visible = true;
        }

        foreach ($accommodations as $accommodation) {

            foreach ($accommodation->sponsorship as $sponsor) {

                if($sponsor) {
                    $active = true;
                } else {
                    $active = false;
                }
            }
        }


        
        return view('admin.home', compact("accommodations", "visible", "active"));
    }
}
