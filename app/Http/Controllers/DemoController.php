<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function up()
    {
        return view('Demo.signup');

      
    }


    public function in()
    {
        return view('Demo.signin');
    }


    



    public function signin(Request $request)
    {
        $a=$request->input('email');
        $b=$request->input('password');
     
   
        
$var= DB::table('signup')->where('email', '=', $a)->where('password', '=', $b)->value('email');

        //return $var;
  if($a==$var){

    $vari= DB::table('signup')->where('email', '=', $a)->value('name');

   session()->put('ses',$vari);

    
       //return $value;

//return 'ok';

return redirect('/home');

  }

else{
  

    //return 'CREDIENTELS INCORREECT';
//$err='CREDIENTELS INCORREECT , TRY AGAIN';
    return view('demo.errin');


}
    }
    



    public function s(Request $request)
    {
        $a=$request->input('name');
        $b=$request->input('email');
        $c=$request->input('password');

        $var=DB::table('signup')->where('email', $b)->value('email');
        
        if($var==$b){
          //  $value='EMAIL ALREADY TAKEN , TRY AGAIN';
            //return view('demo.home')->with('value',$value);

            return view('demo.errup');
        }
else{
        DB::table('signup')->insert([
            ['name' => $a,
             'email' => $b,
             'password' => $c],
           
        ]);


           session()->put('ses',$a);

      $value = session('ses');


      return redirect('/home');
}//
        
}


public function home()
{

    $value = session('ses');
//return $value;


return view('demo.home')->with('value',$value);

}

    


public function signout()
{

   // return 'olo';


   session()->forget('ses');
    return redirect('/home');

}


    ////////////
}///////////
