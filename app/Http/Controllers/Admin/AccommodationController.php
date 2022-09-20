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
use Illuminate\Support\Facades\Storage;

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
    {
        $services = Service::all();
        $typologies = Typology::all();

        return view("admin.accommodation.create", compact("services", "typologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccommodationRequest $request)
    {

        $accommodation = new Accommodation();

        $data = $request->validated();

        $accommodation->fill($data);

        $accommodation->user_id = Auth::user()->id;

        $coverImg = Storage::put("/accommodation", $data["image"]);
    
        $accommodation->image = $coverImg;

        // Check if the 'available' toggle is on
        if (key_exists("available", $data)) {
            $accommodation->available = 1;
        } else {
            $accommodation->available = 0;
        }

        $accommodation->save();

        if (key_exists("services", $data)) {
            $accommodation->services()->attach($data["services"]);
        }

        return  redirect()->route("admin.accommodation.show", $accommodation->id);
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
        $accommodation = Accommodation::findOrFail($id);

        $services = Service::all();
        $typologies = Typology::all();

        return view("admin.accommodation.edit", compact("accommodation", "services", "typologies"));
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
        $accommodation = Accommodation::findOrFail($id);
        
        $data = $request->validated();

        Storage::delete($accommodation->image);
        $accommodation->image=Storage::put("/accommodation", $data["image"]);
         
        if (key_exists("services", $data)) {
            
            $accommodation->services()->sync($data["services"]);
        } else {
            $accommodation->services()->sync([]);
        }

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


        if($accommodation->trashed()){
            $accommodation->services()->detach();
            $accommodation->forceDelete();
        }
        else{
            $accommodation->delete();
        }
        $accommodation->delete();

        return redirect()->route("admin.accommodation.index");
    }
}
