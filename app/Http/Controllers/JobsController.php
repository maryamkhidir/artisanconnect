<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Log;
use App\User;
use App\Tasks;

class JobsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $id = Auth::user()->id;
        //dd(Auth::user()->type);
        if(Auth::user()->type == 4){ //artisan
          $data = Tasks::join('users','tasks.artisan_id', 'users.id')->where("artisan_id",$id)->where("status",1)->get();
        }else{
          $data = Tasks::join('users','tasks.artisan_id', 'users.id')->where("vendor_id",$id)->where("status",1)->get();
        }
        
        return view('dashboard.tasks', compact("data"));
    }

    public function completedTasks()
    {
        $id = Auth::user()->id;
        //dd(Auth::user()->type);
        if(Auth::user()->type == 4){ //artisan
          $data = Tasks::join('users','tasks.vendor_id', 'users.id')->where("artisan_id",$id)->where("status",0)->get();
        }else{
          $data = Tasks::join('users','tasks.artisan_id', 'users.id')->where("vendor_id",$id)->where("status",0)->get();
        }
        
        return view('dashboard.closedtasks', compact("data"));
    }


    public function saveJob(Request $request)
    {
      $request->validate([
        'userid' => 'required',
        'artisanid' => 'required'
      ]);
      
      $insert = Tasks::firstOrCreate([
        'vendor_id' => $request->userid,
        'artisan_id'  => $request->artisanid,
        'status' => 1
      ]);

      if($insert) return 'success';
      else return 'failed';
    }

    public function closeTask(Request $request)
    {      
      $completed = ($request->status == 0) ?  "completed+1" : "completed+0" ;

      //Update
      if(Auth::user()->type == 4){
        $update = [
          "status" => $request->status
        ];
        $data = Tasks::where("id",$request->task)->update($update);
        User::where("id", $request->artisanid)->update(["completed"=>DB::raw($completed)]);
        
      }else{
        $update = [
          "status" => $request->status,
          "rating" => $request->rating,
          "feedback" => $request->feedback
        ];
        $data = Tasks::where("id",$request->task)->update($update);

        $newrating = Tasks::where('artisan_id',$request->artisanid)->whereNotNull('rating')->avg('rating');
        User::where("id", $request->artisanid)->update(["star"=>$newrating, "completed"=>DB::raw($completed)]);
      }

      if($data) return back()->with('success',"Task closed successfully!");
      return back()->with('error',"Error closing task!");

    }

}
