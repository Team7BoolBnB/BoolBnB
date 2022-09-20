<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Http\Requests\SponsorshipRequest;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $accommodations=Accommodation::where("user_id",Auth::id())->get();
        /* dd($accommodations);
        $sponsorships = Accommodation::find(Auth::id())->sponsorship()->get();
         */

        foreach ($accommodations as $accommodation) {

            foreach ($accommodation->sponsorship as $sponsor) {
                if($sponsor) {
                    $active = true;
                } else {
                    $active = false;
                }
            }
        }

        return view("admin.sponsorship.index", compact("accommodations", "active"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sponsorships = Sponsorship::all();

        return view("admin.sponsorship.create", compact("sponsorships"));
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
        $newSponsorship = Sponsorship::create($data);

        return  redirect()->route("admin.sponsorship.show", $newSponsorship->id);
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
