<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StripeApiService;
use Log;

class TestController extends Controller
{
    public function create(){

        $stripeService = new StripeApiService();
        $result = $stripeService->createCustomer();
    }

    public function delete(){

        $stripeService = new StripeApiService();
        $result = $stripeService->deleteCustomer();
    }
    
    public function createPaymentMethod(){

        $stripeService = new StripeApiService();
        $result = $stripeService->createPaymentMethod();
    }

    //
    public function createPaymentIntent(){

        $data = array(    
            'amount' => 5100,
            'currency' => 'dkk',
            'payment_method' => 'pm_1KqXrmAKYRacajMi2QmNQ0Qd',
            'customer' => 'cus_LXJ8YbE9xFOOgA', 
            "description" => "Payment & payment method & customer",
            "off_session"   => true,
            "confirm"  => true
        );

        $stripeService = new StripeApiService();
        $result = $stripeService->createPaymentIntent($data);
    }

    //
    public function confirmPaymentIntent(){
        $stripeService = new StripeApiService();
        $result = $stripeService->confirmPaymentIntent();
    }

    //
    public function capturePaymentIntent(){
        $stripeService = new StripeApiService();
        $result = $stripeService->capturePaymentIntent();
    }


}
