<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Http\Controllers\Controller;
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
        
        $accommodations = Accommodation::where("user_id",$user_id)->get()->first();
       

        return view("admin.accommodation.index", compact("accommodations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.accommodation.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "address" => "required|min:6|max:255",
            "longitude" => "required|min:5|max:15",
            "latitude" => "required|min:5|max:15",
            "title" => "required",
            "description" => "required|min:80|max:255",
            "rooms" => "required|min:1|max:10",
            "beds" => "required|min:1|max:10",
            "bathrooms" => "required|min:1|max:6",
            "mt_square" => "required|min:25|max:300",
            "image" => "required",
            "available" => "required"
        ]);
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
        $accommodation = Accommodation:: findOrFail($id);

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

        return view("admin.accommodation.edit", compact("accommodation"));
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
        $accommodation = Accommodation:: findOrFail($id);

        $data = $request->validate([
            "address" => "required|min:6|max:255",
            "longitude" => "required|min:5|max:15",
            "latitude" => "required|min:5|max:15",
            "title" => "required",
            "description" => "required|min:80|max:255",
            "rooms" => "required|min:1|max:10",
            "beds" => "required|min:1|max:10",
            "bathrooms" => "required|min:1|max:6",
            "mt_square" => "required|min:25|max:300",
            "image" => "required",
            "available" => "required"
        ]);
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
