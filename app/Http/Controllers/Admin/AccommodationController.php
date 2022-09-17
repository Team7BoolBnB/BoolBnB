<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccommodationRequest;
use App\Service;
use App\Typology;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user_id=Auth::id();
        
        //Get all the accommodations of logged user
        $accommodations = Accommodation::where("user_id",$user_id)->get();

        return view("admin.accommodation.index", compact("accommodations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $services=Service::all();
       $typologies=Typology::all();

        return view("admin.accommodation.create",compact("services", "typologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validated();
        $newAccommodation = Accommodation::create($data);

        return  redirect()->route("admin.accommodation.show", $newAccommodation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accommodation = Accommodation::findOrFail($id);

        return view("admin.accommodation.show", compact("accommodation"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accommodation = Accommodation:: findOrFail($id);
        $services=Service::all();
        $typologies=Typology::all();

        return view("admin.accommodation.edit", compact("accommodation","services","typologies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccommodationRequest $request, $id)
    {
        $accommodation = Accommodation:: findOrFail($id);

        $data = $request->validated();
        $accommodation->update($data);

        return  redirect()->route("admin.accommodation.show", $accommodation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::findOrFail($id);

        $accommodation -> delete();

        return redirect()->route("admin.accommodation.index");
    }
}
