<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user_id = Auth::id();

        $accommodations = Accommodation::where("user_id", $user_id)->orderBy("created_at", "desc")->get()->take(2);

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

        if (count($accommodations) == 0) {
            $visible = false;
        } else {
            $visible = true;
        }


        $sponzorizedAccommodation = DB::table('accommodations')
            ->join('sponsorship_accommodation', 'accommodations.id', '=', 'sponsorship_accommodation.accommodation_id')
            ->join('sponsorships', 'sponsorship_accommodation.sponsorship_id', '=', 'sponsorships.id')
            ->select('accommodations.*')->where("user_id",Auth::id())->orderBy("endTime","desc")
            ->get()->take(2);

        



        return view('admin.home', compact("accommodations", "visible","sponzorizedAccommodation"));
    }
}
