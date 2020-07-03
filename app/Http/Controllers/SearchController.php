<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Portfolio;

class SearchController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function browseArtisans(Request $request)
    {
        $whereRaw = ($request->skill) ? "skill = '$request->skill'" : "users.id>0";
        $title = ($request->skill) ? $request->skill."s" : "All Artisans";
        
        $collection = User::select('userid','name','type','phone','star','description','image','address','state','experience')->whereRaw($whereRaw)
                ->join('portfolio', "users.id", '=', 'userid')
                ->distinct()
                ->paginate(10);

        
        /* $collection = Portfolio::join('users', 'users.id', '=', 'portfolio.userid')
                          ->whereRaw($whereRaw)->paginate(10); */
      
        foreach ($collection as $key => $value) {
          # code...
          $value->skills = DB::table('portfolio')->where("userid",$value->userid)->get();
        }
        $collection->withPath($_SERVER['REQUEST_URI']);

        return view('browse-artisans', compact("collection","title"));
    }

    public function viewArtisan(Request $request)
    {
      $user = User::where("id",$request->userid)->first();

      $skills = Portfolio::where("userid",$request->userid)->get();

      return view('view-artisan', compact("user","skills"));
    }

}
