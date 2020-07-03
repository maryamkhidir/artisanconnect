<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Portfolio;
use App\Skills;

class SkillsController extends Controller
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
        $id = Auth::user()->id;
        $data = Portfolio::where("userid",$id)->get();
        /* $dataimages = Portfolio::select('image1', 'image2')->where("userid",$id)->distinct()->get();
        dd($dataimages); */
        return view('dashboard.skills', compact("data"));
    }

    public function add(){
        $data = Skills::all();
        return view('dashboard.addskills', compact("data"));
    }

    public function create(Request $request){

        $request->validate([
            'images.*' => 'required|image',
            'skills' => 'required',
            'skills.*' => 'required'
        ]);
            
        $id = Auth::user()->id;
        $image_names = ["",""];


        if($request->hasFile('images')){
            $images = $request->file('images');
            //dd(count($images));
            //max 2 images
            for ($i=0; $i < count($images); $i++) { 
                $ext = $images[$i]->getClientOriginalName();
                Storage::disk('public')->put($ext,  File::get($images[$i]));
                $image_names[$i] = $ext;
            }
        }

        $count = 0;
        foreach ($request->skills as $skill) {
            $insert = Portfolio::firstOrCreate([
                    'userid' => $id,
                    'skill'  => $skill
                ],
                [
                    'image1' => $image_names[0],
                    'image2' => $image_names[1]
            ]);
            if($insert->wasRecentlyCreated) $count++;
        }
        if($count > 0) return back()->with('success',"Skills added successfully!");
        return back()->with('error',"Error adding skills. Record exists!");

    }

    public function edit(Request $request){

      $id = Auth::user()->id;
      if($request->delete_skill){

        $data = Portfolio::where([["userid","=",$id],["skill", "=", $request->skill]])->delete();
        if($data) return back()->with('success',"Skill deleted successfully!");
        return back()->with('error',"Error deleting skill!");

      }else{
        $update = [];

        if($request->hasFile('image1')){
            $image1 = $request->file('image1');
            $ext = $image1->getClientOriginalName();
            Storage::disk('public')->put($ext,  File::get($image1));
            $update["image1"] = $ext;
        } 
        if($request->hasFile('image2')){
            $image2 = $request->file('image2');
            $ext2 = $image2->getClientOriginalName();
            Storage::disk('public')->put($ext2,  File::get($image2));
            $update["image2"] = $ext2;
        } 

        $data = Portfolio::where([["userid","=",$id],["skill", "=", $request->skill]])->update($update);

        if($data) return back()->with('success',"Skill edited successfully!");
        return back()->with('error',"Error updating skill!");

      }

    }

}
