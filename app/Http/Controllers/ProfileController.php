<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $id = Auth::user()->id;

        $data = User::where("id",$id)->first();
        //dd($profile_data->phone);
        return view('dashboard.profile', compact("data"));
    }

    public function updateProfile(Request $request)
    {
        if($request->update_profile){
            $id = Auth::user()->id;
            //dd($request);

            $upload_array = [
                'name' => $request->name,
                'email' => $request->email,
                'description' => $request->description,
                'address' => $request->address,
                'experience' => $request->experience
                //'state' => $request->state,
                //'phone' => $request->phone,
                /* 'password' => Hash::make($request->password), */
                //'type' => $request->type,
            ];

            //process photos & upload
            if($request->hasFile('image')){
                $photo = $request->file('image');
                $extension = $photo->getClientOriginalExtension();
                Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));
                $upload_array["image"] = $photo->getFilename().'.'.$extension;
            }
            if($request->hasFile('identification')){
                $idcard = $request->file('identification');
                $ext = $idcard->getClientOriginalName();
                Storage::disk('public')->put($ext,  File::get($idcard));
                $upload_array["identification"] = $ext;
            } 
            if($request->hasFile('utility')){
                $utility = $request->file('utility');
                $ex = $utility->getClientOriginalName();
                Storage::disk('public')->put($ex,  File::get($utility));
                $upload_array["utility"] = $ex;
            }

            $data = User::where("id",$id)->update($upload_array);

            if($data) return back()->with('success',"Profile updated successfully!");
            return back()->with('error',"Error updating profile!");
        }

        if($request->update_password){
            $request->validate([
                'password' => 'required|string|min:6|confirmed'
            ]);
            
            $id = Auth::user()->id;
            $data = User::where("id",$id)->update(['password' => Hash::make($request->password)]);

            if($data) return back()->with('success',"Password changed successfully!");
            return back()->with('error',"Error changing password!");
        }
    }
}
