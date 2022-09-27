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
    public function show($slug)
    {
        $raw = 'SELECT
        accommodations.*,
        typologies.*,
        services.*,
        users.firstName, users.lastName

    FROM
        users
        JOIN accommodations ON accommodations.user_id = users.id
    JOIN typologies ON typologies.id = accommodations.typology_id
    JOIN service_accommodation ON service_accommodation.accommodation_id = accommodations.id
    JOIN services ON services.id = service_accommodation.service_id
    WHERE accommodations.slug =  "'.$slug.'";';


        $accommodation = DB::select($raw);

        /* $services = [];


        foreach ($accommodation as $service) {
            $services[] = ["name" => $service->name, "icon" => $service->icon];
        } */

        return response()->json([
            
            "accommodation" => $accommodation
        ]);
    }

    public function filter(Request $request)
    {
        $filters = $request->query();
        $count = 0;
        foreach ($filters as $value) {

            $count = $count + 1;
        }

        if ($filters["radius"] && $filters["radius"] && $count == 4) {
            $raw = 'SELECT *,
                         ST_DISTANCE_SPHERE(
                                             POINT(`accommodations`.`longitude`, `accommodations`.`latitude`),
                                             POINT(' . $filters["longitude"] . ',' . $filters["latitude"] . ')
                                                                                                            ) / 1000   AS `distance`
                 FROM
                         `accommodations` 
                
                 HAVING
                         `distance` <= ' . $filters["radius"] . '
                 ORDER BY
                         `distance` ASC;';



            $accommodations = DB::select($raw);
        } else {

            if (key_exists("typology_id", $filters) && $count == 5) {
                $query = 'WHERE `typologies`.`id` = ' . $filters["typology_id"] . '';
            }


            $raw = 'SELECT
            `accommodations`.*,
            `typologies`.`id`,
            `services`.`id`,
            ST_DISTANCE_SPHERE(
                POINT(
                    `accommodations`.`longitude`,
                    `accommodations`.`latitude`
                ),
                POINT(' . $filters["longitude"] . ',' . $filters["latitude"] . ')
            ) / 1000 AS `distance`
        FROM
            `accommodations`
        JOIN `typologies` ON `typologies`.`id` = `accommodations`.`typology_id`
        JOIN `service_accommodation` ON `service_accommodation`.`accommodation_id` = `accommodations`.`id`
        JOIN `services` ON `services`.`id` = `service_accommodation`.`service_id`
        
        ' . $query . '
        HAVING
            `distance` <= ' . $filters["radius"] . '
        ORDER BY
            `distance` ASC;';



            $ALLaccommodations = DB::select($raw);
            $accommodations = [];
            //ELIMINARE ACCOMMODATIONS DOPPIE A CAUSA DI SERVIZI  MULTIPPLI

        }



        return response()->json($accommodations);
    }
}
