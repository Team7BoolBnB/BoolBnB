<?php

namespace App\Http\Controllers\Api;

use App\Accommodation;
use App\Http\Controllers\Controller;
use App\Service;
use App\Typology;
use Illuminate\Http\Request;

class AdvancedSearchController extends Controller
{
    public function index(){
        $services = Service::all();
        $typologies = Typology::all();

        return response()->json([
            "services" => $services,
            "typologies" => $typologies
        ]);
    }
}
