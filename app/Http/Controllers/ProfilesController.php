<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
use Alert;


class ProfilesController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('PmsErp.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request )
    {
        $this->validate($request, 
          [

            'name' => 'required',
            'email' => 'required|email',
            'profileimage' =>'image|mimes:png,jpg,jpeg|max:2000'

          ]);

            $user = Auth::user();

            $user->name =$request->name;
            $user->email=$request->email;
            $user->title=$request->title;
            $user->phonenumber=$request->phone;
            $user->facebook=$request->facebook;
            $user->linkedin=$request->linkedin;
            if($user['profileimage']==''){
            if($request->file('profileimage')){
            $image=$request->file('profileimage');
            
            if($image->isValid()){
                $fileName=time().$image->getClientOriginalName();
                $small_image_path=public_path('PmsErp/userProfile/'.$fileName);
                //Resize Image
                Image::make($image)->resize(500,500)->save($small_image_path);
                $user->profileimage=$fileName;
            }
        }

    }

            if(($request->has('password'))&&($request->password != "") )
            {
                if(($request->password == $request->confirmpassword)){
                    $user->password= bcrypt($request->password);
                    $user->save();
                    Session::flash('success','Account profile updated.');
                }else{
                    Session::flash('error','Password Not Matched.');
            }
            
            $user->save();

            }
            else{
                Session::flash('success','Account profile updated.');
    }


return redirect()->back();



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $user= Auth::user();

          $delete = $user->profileimage;
          $user->profileimage="";
          $user->save();
            $image_small=public_path().'/PmsErp/userProfile/'.$delete ;
                unlink($image_small);
            Session::flash('success',' Profile Image Deleted Succesfully!');
        return redirect()->route('user.profile');   
    
    }
}