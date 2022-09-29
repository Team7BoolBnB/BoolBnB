<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        $data=$request->validate([
            "accommodation_id"=>"required",
            "name"=>"required|string|min:5|max:50",
            "email"=>"required|email",
            "content"=>"required|string|max:1000",

       ] );

       $messages=new Message();
       $messages->fill($data);
       

       if($messages){

        $response=[
            "success"=>true,
            "message"=>"L'operazione è andata a buon fine"
        ];
    }
    else{
        $response=[
            "success"=>false,
            "message"=>"Qualcosa è andato storto riprova più tardi"
        ];
    }

    $messages->save();

    return response()->json($response);

    }

    public function destroy(Request $request ){
        $data=$request->validate([
            "accommodation_id"=>"required"
       ] );
            if($data["accommodation_id"]){

                $message=Message::finndOrFail($data["accommodation_id"]);
                $message->delete();
                $response=[
                    "success"=>true,
                    "message"=>"L'operazione è andata a buon fine"
                ];
            }
            else{
                $response=[
                    "success"=>false,
                    "message"=>"Qualcosa è andato storto riprova più tardi"
                ];
            }
    
       return response()->json($response);
    }
}
