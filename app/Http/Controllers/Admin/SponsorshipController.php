<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorshipRequest;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sponzorizedAccommodation = DB::table('accommodations')
            ->join('sponsorship_accommodation', 'accommodations.id', '=', 'sponsorship_accommodation.accommodation_id')
            ->join('sponsorships', 'sponsorship_accommodation.sponsorship_id', '=', 'sponsorships.id')
            ->select('sponsorships.*',"accommodations.*")->where("user_id",Auth::id())->orderBy("endTime","desc")
            ->get();

        /* $active = false; */

        return view("admin.sponsorship.index", compact("sponzorizedAccommodation"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sponsorships = Sponsorship::all();

        //Get all the accommodations of logged user
        $user_id = Auth::id();
        $accommodations = Accommodation::where("user_id", $user_id)->get();

        return view("admin.sponsorship.create", compact("sponsorships", "accommodations"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorshipRequest $request)
    {
        $data = $request->validated();

        $period=Sponsorship::findOrFail($data["sponsorship_id"]); 

        $orario="+" . $period->period . " hours";
        
        $calcultedData=date_modify(date_create($data["startTime"]), $orario);

        DB::table('sponsorship_accommodation')->insertGetId(
            ['accommodation_id' => $data["accommodation_id"], 'sponsorship_id' =>$data["sponsorship_id"], 'startTime' => $data["startTime"], 'endTime' => $calcultedData]
        );   

        return  redirect()->route("admin.home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
