<?php

namespace App\Services;

class StripeApiService extends BaseService{

    private $stripe_key;
    private $user;

    public function __construct($user=null){

        $this->stripe_key = env('STRIPE_SECRET_KEY');
        $this->user = $user;
    }

    public function createCustomer(){
        try {

            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );
            $response = $stripe->customers->create([
                // 'email' => $user->email,
                'email' => 'tayyab.aslam@gmail.co',
                'description' => 'customer created at GMT '.date('Y-m-d H:i:s'),
            ]);
    
            $this->user->stripe_customer_id = $response['id'];
            $this->user->save();

            return true;
        } catch (\Throwable $th) {
            logger('stripe create customer api error: '.$th->getMessage());
            return false;
        }
    }

    public function deleteCustomer(){
		try{
			
            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );
            $stripe->customers->delete(
                $this->user->stripe_customer_id,
            );

            $this->user->stripe_customer_id = '';
            $this->user->save();

            return true;
		} catch(\Exception $th){
            logger('stripe create customer api error: '.$th->getMessage());
			return false;
		}
	}

    public function createPaymentMethod(){
        try{
            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );
            
            $response = $stripe->paymentMethods->create([
                'type' => 'card',
                'card' => [
                  'number' => '4242 4242 4242 4242',
                  'exp_month' => 4,
                  'exp_year' => 2024,
                  'cvc' => '123',
                ],
            ]);


            $stripe->paymentMethods->attach(
                $response['id'],
                ['customer' => 'cus_LXJ8YbE9xFOOgA']
            );

            dd($response['id']);
            return true;

		} catch(\Exception $th){
            logger('stripe create payment method api error: '.$th->getMessage());
			return false;
		}

    }

    public function createPaymentIntent($data){
        try{
            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );
            $response = $stripe->paymentIntents->create([
                $data
            ]);

            dd($response);
            return true;

		} catch(\Exception $th){
            logger('stripe create payment intent api error: '.$th->getMessage());
			return false;
		}

    }


    ## Confirm payment indent
    public function confirmPaymentIntent(){
        try{
    
            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );

            $response = $stripe->paymentIntents->confirm(
                'pi_3KqWw7AKYRacajMi0R8C1Jd1',
                ['payment_method' => 'pm_card_visa']
            );
            dd($response);
            return true;

		} catch(\Exception $th){
            logger('stripe create confirm payment intent api error: '.$th->getMessage());
			return false;
		}

    }


    public function capturePaymentIntent(){
        try{
            $stripe = new \Stripe\StripeClient(
                $this->stripe_key
            );
            
            $stripe->paymentIntents->capture(
                'pi_3KqWSZAKYRacajMi2rsJoXrv',
                []
            );

            dd($response);
            return true;

		} catch(\Exception $th){
            logger('stripe capture payment intent api error: '.$th->getMessage());
			return false;
		}

    }






    
}

?>