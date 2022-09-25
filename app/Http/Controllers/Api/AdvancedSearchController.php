<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Service;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvancedSearchController extends Controller
{
    public function index()
    {

        $services = Service::all();
        $typologies = Typology::all();

        return response()->json([
            "services" => $services,
            "typologies" => $typologies,

        ]);
    }

    public function filter(Request $request)
    {
        $filters = $request->query();

        $raw = 'SELECT
        *,
        ST_DISTANCE_SPHERE(
            POINT(`accommodations`.`longitude`, `accommodations`.`latitude`),
            POINT('.$filters["longitude"].','.$filters["latitude"].')
                           ) / 1000   AS `distance`
    FROM
        `accommodations`
    HAVING
        `distance` <= '.$filters["radius"].'
    ORDER BY
        `distance` ASC;';
$accommodations = DB::select($raw);
        //La query deve funzionare anche con l'indirizzo soltanto,
        //quindi per prima cosa filtro per indirizzo e raggio

        /* $accommodations = DB::table('accommodations')->select(DB::raw('*,
        ST_DISTANCE_SPHERE(
            POINT(`accommodations`.`longitude`, `accommodations`.`latitude`),
            POINT(  $filters["longitude"]  , $filters["latitude"] )
                           ) / 1000   AS `distance`'));

        if (key_exists("radius", $filters) && key_exists("latitude", $filters) && key_exists("longitude", $filters)) {

            $accommodations->having('distance', '<=', $filters["radius"])
                ->orderBy('distance')
                ->get();
        }

        dd($accommodations); */

        return response()->json($accommodations);
    }
}
