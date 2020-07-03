<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Portfolio;
use App\Skills;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $spot_artisan = User::join('spotlight', 'users.id', '=', 'spotlight.userid')
                            ->first();

        $collection = User::where('star', ">=", 4)
                        ->orderBy('completed','desc')
                        ->orderBy('star','desc')
                        ->limit(5)->get();

        foreach ($collection as $key => $value) {
          # code...
          $value->skills = DB::table('portfolio')->where("userid",$value->id)->limit(3)->get();
        }
        return view('welcome', compact('collection','spot_artisan'));
    }

    public function allCategories(){
      $data = Skills::all();
      return view('all-categories', compact('data'));
    }

    public function search(Request $request)
    {
      $request->validate([
        'title' => 'required|string'
      ]);

      $whereRaw = ($request->title) ? "skill LIKE '%$request->title%' OR users.name LIKE '%$request->title%' " : "users.id>0";
      $whereRaw = ($request->location) ? $whereRaw." AND state LIKE '%$request->location%' OR address LIKE '%$request->location%' " : $whereRaw." ";
      //dd($whereRaw);

      $title = ($request->title) ? $request->title."s" : "All Artisans";
      $title = ($request->location) ? $title." in ".$request->location : $title."";
        
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
}
