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
use Illuminate\Support\Str;

class AccommodationController extends Controller
{


    private function findBySlug($slug)
    {
        $accommodation = Accommodation::where("slug", $slug)->first();

        if (!$accommodation) {
            abort(404);
        }

        return $accommodation;
    }

    private function generateSlug($text)
    {
        $toReturn = null;

        $counter = 0;
        do {
            //genero uno slug partendo dal titolo
            $slug = Str::slug($text);

            //se il counter è maggiore di zero, allego al suo valore lo slug
            if ($counter > 0) {

                $slug .= "-" . $counter;
            }

            //controllo nel databse se esiste un slug uguale 
            $slug_exist = Accommodation::where("slug", $slug)->first();

            if ($slug_exist) {
                //se esiste lo slug incremento il valore del counter per il giro successivo
                $counter++;
            } else {
                //altrimenti salvo lo slugnei dati del nuovo post
                $toReturn = $slug;
            }
        } while ($slug_exist);

        return $toReturn;
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()




    {
        $user_id = Auth::id();

        //Get all the accommodations of logged user
        $accommodations = Accommodation::where("user_id", $user_id)->get();

        /* $accommodations = []; */

        if (count($accommodations) == 0) {
            $visible = false;
        } else {
            $visible = true;
        }

        return view("admin.accommodation.index", compact("accommodations", "visible"));
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

        $accommodation->slug = $this->generateSlug($accommodation->title);

        $accommodation->save();

        if (key_exists("services", $data)) {
            $accommodation->services()->attach($data["services"]);
        }

        return  redirect()->route("admin.accommodation.show", $accommodation->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $accommodation = $this->findBySlug($slug);

        return view("admin.accommodation.show", compact("accommodation"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $accommodation = $this->findBySlug($slug);

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
    public function update(AccommodationRequest $request, $slug)
    {

        $data = $request->validated();

        $accommodation = $this->findBySlug($slug);

        if ($data["title"] !== $accommodation->title) {
            //genero un nuovo slug
            $accommodation->slug = $this->generateSlug($data["title"]);
        }


        Storage::delete($accommodation->image);
        $accommodation->image = Storage::put("/accommodation", $data["image"]);

        if (key_exists("services", $data)) {

            $accommodation->services()->sync($data["services"]);
            $accommodation->sponsorships()->sync($data["sponsorships"]);

        } else {
            $accommodation->services()->sync([]);
            $accommodation->sponsorships()->sync([]);

        }

        $accommodation->update($data);

        return  redirect()->route("admin.accommodation.show", $accommodation->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $accommodation = $this->findBySlug($slug);
        $accommodation->services()->detach();
        $accommodation->sponsorship()->detach();
        $accommodation->messages()->delete();
        $accommodation->delete();
        /* if ($accommodation->trashed()) {
            $accommodation->services()->detach();
            $accommodation->forceDelete();
        } else {
            $accommodation->delete();
        }
        $accommodation->delete(); */

        return redirect()->route("admin.home");
    }
}
