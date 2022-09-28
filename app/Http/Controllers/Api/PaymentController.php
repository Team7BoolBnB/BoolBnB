<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentRequest;
use App\Sponsorship;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data =
            [
                "token" => $token
            ];

        return response()->json(
            $data,
            200
        );
    }
    public function makePayment(PaymentRequest $request, Gateway $gateway)
    {   
        $psonsorship=DB::table("sponsorships")->where("id",$request->idSponsorship)->first();
       
        $transaction = $gateway->transaction()->sale([
            "amount" => $psonsorship->price,
            "paymentMethodNonce" => $request->token,
            "options"=> [
                "submitForSettlement" => TRUE
            ]
        ]);

        if ($transaction->success) {
            $data = [
                "success" => true,
                "message" => "Operazione andata a buon fine."
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                "success" => false,
                "message" => "Operazione fallita."
            ];

            return response()->json($data, 401);
        }
    }
}
