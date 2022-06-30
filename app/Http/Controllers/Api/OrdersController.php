<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon as Carbon;
use App\Models\Order;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/* use App\Http\Requests\Orders\OrdersRequest;
 */
class OrdersController extends Controller
{
    public function generate( Request $request, Gateway $gateway){
        $token = $gateway->clientToken()->generate();
        $data = [
            'token' => $token,
            'success' => true,
        ];
        
        return response()->json($data, 200);
    }



    public function makePayment(Request $request, Gateway $gateway){

        $result = $gateway->transaction()->sale([
            'amount' => /* $product->price */ 120,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ],
/*             'customer' => [
                'firstName' => 'Vittorio',
                'lastName' => 'Campese',
            ] */
        ]);

        if($result->success){
            $data = [ 
            'message' => 'Transazione eseguita con successo',
            'success' => true,
            'result' => $result, 
            ];
            return response()->json($data, 200);
        } else {
            $data = [ 
                'message' => 'Transazione rifiutata',
                'success' => false
            ];
            return response()->json($data, 401);
        }
    }

    public function addOrder(Request $request){
        $order = new Order();
        // $order->customer_name = $request["name"];
        // $order->customer_address = $request["address"];
        // $order->customer_email = $request["email"];
        // $order->amount = $request["amount"];
        $order->customer_name = "Ludsdgca";
        $order->customer_address = "Via Romagdsg 125";
        $order->customer_email = "provdfda@gmail.com";
        $order->order_date = Carbon::now();
        $order->pickup_date = Carbon::now();
        $order->user_id = 5;
        $order->amount = 54.50;
        $order->save();
        // $order->user()->attach("2");
        return response()->json($order, 200);
    }
}
