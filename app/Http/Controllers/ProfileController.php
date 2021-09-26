<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use DB;
use App\Http\Requests\ValidateProfile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $var=auth()->user()->profile;
        //$p=auth()->user()->id;
      //$var=profile::where('user_id',$p)->get();
    //return $var;
        
     return view('profile.index',compact('var'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        ///return view('profile.create');
        return view('profile.finalc');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProfile $request)
    {





        if($request->hasFile('cover_image')){
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

    
            
        }
            
            else{$fileNameToStore='noimg.jpg';}
            

           

        $post= new profile;
        $post->phone =$request->input('ph');
        $post->address =$request->input('address');
     
        $post->profile_pic =$fileNameToStore;
        $post->user_id=auth()->user()->id;
       
        
        $post->save();

      
      //  return redirect('/home')->with('success','PROFILE CREATED SUCCESSFULLY');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    function action(Request $request)
    {

        
        if($request->hasFile('select_file')){
            $filenameWithExt=$request->file('select_file')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('select_file')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('select_file')->storeAs('public/cover_images',$fileNameToStore);

    
            
        }
            
            else{$fileNameToStore='noimg.jpg';}

            


        $post= new profile;
        $post->phone =$request->input('ph');
        $post->address =$request->input('address');
     
        $post->profile_pic =$fileNameToStore;

        $post->user_id=auth()->user()->id;
       
        
        $post->save();

        
        return response()->json([
            'message'   => 'Image uploaded',
     
         #   'uploaded_image' => '<img src="https://cdn.pixabay.com/photo/2014/06/03/19/38/road-sign-361514_640.png" class="img-thumbnail" width="300" />',
     
         'uploaded_image' => '<img src="http://localhost:8080/proj/storage/app/public/cover_images/'.$fileNameToStore.'" class="img-thumbnail" width="300" />', 
          
            'class_name'  => 'alert-success'
           ]);


    }

#############
/*
 function action(Request $request)
    {
        


      $image = $request->file('select_file');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      return response()->json([
       'message'   => 'Image Upload Successfully',

       #'uploaded_image' => '<img src="/images/'.$new_name.'" class="img-thumbnail" width="300" />',

       'uploaded_image' => '<img src="https://www.w3.org/Graphics/PNG/text2.png" class="img-thumbnail" width="300" />',

       'class_name'  => 'alert-success'
      ]);

      */

####################

      /*
     }
     else
     {
      return response()->json([
       'message'   => $validation->errors()->all(),
       'uploaded_image' => '',
       'class_name'  => 'alert-danger'
      ]);
     }

     */
   # }
  

    
     
}////>>
