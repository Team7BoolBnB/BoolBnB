<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Service;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdvancedSearchController extends Controller
{ 
    
    public function coordinate($address){
        $baseUrl='https://api.tomtom.com/search/2/search/';
        $apiKey='ziNw7Yn7FMXsuIsY65fMoQmyy7qrHcM3';
        $address= urlencode($address);
        
         $apiURL = $baseUrl . $address .'.json?key='. $apiKey;
    
        
        $headers = [
            'X-header' => 'value'
        ];
  
        $response = Http::withHeaders($headers)->get($apiURL);
         $decodedData=json_decode($response->getBody(), true);

        $coordinate=$decodedData["results"][0]["position"];
        
       return  $coordinate;
        
    }

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
        typologies.name,
        typologies.icon,
        services.name,
        services.icon
        

    FROM
        accommodations

    LEFT JOIN service_accommodation ON service_accommodation.accommodation_id = accommodations.id
    LEFT JOIN services ON services.id = service_accommodation.service_id  
    LEFT JOIN users ON accommodations.user_id = users.id
     JOIN typologies ON typologies.id = accommodations.typology_id
    WHERE accommodations.slug =  "'.$slug.'";';

$raw2 = 'SELECT  
       users.firstName,
       users.lastName
    FROM
        users

    LEFT JOIN accommodations ON accommodations.user_id = users.id

    WHERE accommodations.slug =  "'.$slug.'";';

        $accommodation = DB::select($raw);
        $userDetails=DB::select($raw2);
        $typologies = Typology::findOrFail($accommodation[0]->typology_id);
        $user=Auth::user();
        /* $typologies = [];


        foreach ($accommodation as $typology) {
            $typologies[] = ["name" => $typology->name];
        } */

        return response()->json([
            "typology" => $typologies,
            "accommodation" => $accommodation,
            "userDetails"=>$userDetails,
            "user"=>$user
        ]);
    }


   

    public function filter(Request $request)
    {  
        
        $filters = $request->query();

        $coordinate= $this->coordinate($filters["address"]);
        
      
        $count=0;
        foreach ($filters as $value) {

            $count=$count+1;
        }
       /*  if($filters["services"]){
            $filtersQuery="";
                
            foreach ($filters["services"] as  $value) {
                
                $filtersQuery +='`services`.`id` = '.$value. 'AND';

        }}
        
        dd( $filtersQuery);
     */

        if($filters["radius"] && $filters["radius"] && $count==2){
$raw = 'SELECT *,
                         ST_DISTANCE_SPHERE(
                                             POINT(`accommodations`.`longitude`, `accommodations`.`latitude`),
                                             POINT('.$coordinate["lon"].','.$coordinate["lat"].')
                                                                                                            ) / 1000   AS `distance`
                 FROM
                         `accommodations` 
                
                 HAVING
                         `distance` <= '.$filters["radius"].' AND `accommodations`.`available` = 1
                 ORDER BY
                         `distance` ASC;';



            $accommodations = DB::select($raw);
        }
        else{
            if(key_exists("beds",$filters) && $count==3){ $query='WHERE `accommodations`.`beds` >= '.$filters["beds"].'';};
            if(key_exists("rooms",$filters) && $count==3){$query='WHERE `accommodations`.`rooms` >= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters) && $count==3){$query='WHERE `accommodations`.`bathrooms` >= '.$filters["bathrooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("rooms",$filters) && $count==4){$query='WHERE `accommodations`.`bathrooms` >= '.$filters["bathrooms"].'AND `accommodations`.`rooms` >= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("beds",$filters) && $count==4){$query='WHERE `accommodations`.`beds` >= '.$filters["beds"].'   AND  `accommodations`.`bathrooms` >= '.$filters["bathrooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("beds",$filters) && $count==4) { $query='WHERE `accommodations`.`beds` >= '.$filters["beds"].' AND `accommodations`.`rooms` >= '.$filters["rooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("bathrooms",$filters) && key_exists("beds",$filters) && $count==5) {$query='WHERE `accommodations`.`bathrooms` >= '.$filters["bathrooms"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].' AND `accommodations`.`beds` <= '.$filters["beds"].'';};
            
            //da fare ancora
            
/* 
            if(key_exists("beds",$filters) && key_exists("services",$filters) && $count==4){ $query='WHERE `accommodations`.`beds` <= '.$filters["beds"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("rooms",$filters)&& key_exists("services",$filters)  && $count==4){$query='WHERE `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters)&& key_exists("services",$filters)  && $count==4){$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("rooms",$filters) && $count==5){$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("services",$filters) && key_exists("beds",$filters) && $count==5){$query='WHERE `accommodations`.`beds` <= '.$filters["beds"].'   AND  `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("services",$filters) && key_exists("beds",$filters) && $count==5) { $query='WHERE `accommodations`.`beds` <= '.$filters["beds"].' AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("services",$filters) && key_exists("bathrooms",$filters) && key_exists("beds",$filters) && $count==6) {$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].' AND `accommodations`.`beds` <= '.$filters["beds"].'';};


            
            if(key_exists("beds",$filters) && key_exists("services",$filters) && key_exists("typology_id",$filters) && $count==5){ $query='WHERE `accommodations`.`beds` <= '.$filters["beds"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("rooms",$filters)&& key_exists("services",$filters) && key_exists("typology_id",$filters)  && $count==5){$query='WHERE `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters)&& key_exists("services",$filters) && key_exists("typology_id",$filters)   && $count==5){$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("rooms",$filters) && key_exists("typology_id",$filters) && $count==7){$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("bathrooms",$filters) && key_exists("services",$filters) && key_exists("typology_id",$filters) && key_exists("beds",$filters) && $count==7){$query='WHERE `accommodations`.`beds` <= '.$filters["beds"].'   AND  `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("services",$filters) && key_exists("typology_id",$filters) && key_exists("beds",$filters) && $count==7) { $query='WHERE `accommodations`.`beds` <= '.$filters["beds"].' AND `accommodations`.`rooms` <= '.$filters["rooms"].'';};
            if(key_exists("rooms",$filters) && key_exists("services",$filters) && key_exists("typology_id",$filters) && key_exists("bathrooms",$filters) && key_exists("beds",$filters) && $count==7) {$query='WHERE `accommodations`.`bathrooms` <= '.$filters["bathrooms"].'AND `accommodations`.`rooms` <= '.$filters["rooms"].' AND `accommodations`.`beds` <= '.$filters["beds"].'';};
            
            

            if(key_exists("typology_id",$filters) && $count==3){
                $query='WHERE `typologies`.`id` = '.$filters["typology_id"].'';
            } */

            $raw = 'SELECT
            `accommodations`.*,
            `typologies`.`id`,
            `services`.`id`,
            ST_DISTANCE_SPHERE(
                POINT(
                    `accommodations`.`longitude`,
                    `accommodations`.`latitude`
                ),
                POINT('.$coordinate["lon"].','.$coordinate["lat"].')
            ) / 1000 AS `distance`
        FROM
            `accommodations`
        JOIN `typologies` ON `typologies`.`id` = `accommodations`.`typology_id`
        JOIN `service_accommodation` ON `service_accommodation`.`accommodation_id` = `accommodations`.`id`
        JOIN `services` ON `services`.`id` = `service_accommodation`.`service_id`
        
        '.$query.'
        HAVING
            `distance` <= '.$filters["radius"].' AND `accommodations`.`available` = 1
        ORDER BY
            `distance` ASC;';



         $accommodations = DB::select($raw);
        /*  $accommodations=[]; */
        //ELIMINARE ACCOMMODATIONS DOPPIE A CAUSA DI SERVIZI  MULTIPPLI
        
        }
        
        

        return response()->json($accommodations);
    }
}
