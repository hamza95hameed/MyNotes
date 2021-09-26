<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;



class EngineController extends Controller{

    
 #MIDDLE WARE START
    public function __construct()
{
    $this->middleware('auth');
}
#MIDDLE WARE END





    /*
        function getForm POST 
        @parameters name
        @return Orders
        this function get orders from database based on status value sent by parameter
        14 June 2019
        @author: Tayyab

        @revision:
        -
    */

    public function getForm(Request $request)
    {   
        #get 'name' parameter from request 
        $name = $request->name;

        #get data from Order Model based on status
        $pos = Order::where('status', $name)->get();

        #return view with data passed
        return view('test.content',compact('pos','name')); 
    }
       


public function count(){

    //$pos= DB::select('SELECT status, count(*) as cnt from orders group by status; ');
    //Eloquent
    $var=Order::selectRaw("status, count(*) as cnt")->groupBy('status')->get();
    //dd($pos);
    return view('test.master',compact('var'))->render(); 

//return $var;

} 



public function fun()
{    
    //$name = session('name');

//switch($name){
//case 'completed':
$pos= DB::select('select * from orders where status="completed" ');
//return $pos;

return view('test.content')->with('pos',$pos); 
//return 'ok';

//return view('test.table',compact('data','name'))->render()//
//}

}
   





      // return $name;


      


    // $name='pending';

    /*
        switch($name)
        {
            case 'pending':
            $data = [[
                'product'=>'cde',
                'amount'=> 10,
                'quantity'=> 9,
                'status'=>'pending'
            ]];
            break;

            case 'active':
            $data = [[
                'product'=>'abcd',
                'amount'=> 5,
                'quantity'=> 155,
                'status'=>'active'
            ]];
            break;

            case 'completed':
            $data = [[
                'product'=>'sas',
                'amount'=> 10,
                'quantity'=> 100,
                'status'=>'completed'
            ]];
            break;

            case 'quotation':
            $data = [[
                'product'=>'absc',
                'amount'=> 1,
                'quantity'=> 2,
                'status'=>'quotation'
            ]];
            break;

            default:
            $data = [
                'product'=>[],
                'amount'=>[],
                'quantity'=>[],
                'status'=>[]
            ];



            default:
            $data = [
                'product'=>'default',
                'amount'=>1000,
                'quantity'=>5,
                'status'=>'default'
            ];

            
            break;
        }
        
        */



     //   return view('test.table',compact('data','name'))->render();

     // return (compact('data','name'));
   // }
    }


