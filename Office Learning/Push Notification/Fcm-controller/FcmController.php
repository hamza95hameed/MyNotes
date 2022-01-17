<?php

namespace App\Http\Controllers\Fcm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FcmController extends Controller
{

    function push_notification($tokens, $message, $notificationData){

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/    
        $api_key = 'AAAA3-sdkJs:APA91bHqPru5zBCSLgnxUKO1jwpoSojrqTQT5xN-1VmGnkM4VqBYhLZRul32QCaTUsNSeHhK99Lrg0BjMYjjzFwf0PJOJHX2qpUg8cThgQd--nqAwTiEYtdasQEUKCXRlXapzuXzkQWJ';
    
        $fields = array (
            'registration_ids' => $tokens,
            'notification'     => $message,
            'data'             => $notificationData,
        );
        
        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );
                    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return True;
    }

    public function index(){
        return view('fcm.firebase');   
      }
  
      public function sendNotification(Request $request){
          $token = "cL6yILTszdU:APA91bEVzgTdj8HM9DhIhsLZ97y08nS32JwU7Svz-Xt9V2wFH_XXlftdqA1BP-j3itbkNCN1pVym-i_yvwW1pAA2Tn09ywSiwnmofl90GYiF0My01Bykvh-cfCjwFeQDwsKy9fSiSWS0";  
          $from = "AAAA3-sdkJs:APA91bHqPru5zBCSLgnxUKO1jwpoSojrqTQT5xN-1VmGnkM4VqBYhLZRul32QCaTUsNSeHhK99Lrg0BjMYjjzFwf0PJOJHX2qpUg8cThgQd--nqAwTiEYtdasQEUKCXRlXapzuXzkQWJ";
          $msg = array
                (
                  'body'  => "New Notification",
                  'title' => $request->msg,
                  'receiver' => 'erw',
                  'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                  'sound' => 'mySound'/*Default sound*/
                );
  
          $fields = array
                  (
                      'to'        => $token,
                      'notification'  => $msg
                  );
  
          $headers = array
                  (
                      'Authorization: key=' . $from,
                      'Content-Type: application/json'
                  );
          //#Send Reponse To FireBase Server 
          $ch = curl_init();
          curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
          curl_setopt( $ch,CURLOPT_POST, true );
          curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
          curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
          curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
          curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
          $result = curl_exec($ch );
          dd($result);
      }  


}
