<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class UserController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
      }
      public function index(Request $request) {
        #$posts=Post::all();
        $userid = $request->user()->id;
        //where('deleted_at','=','NULL')->
        $posts= Post::where('user_id',$userid)->get(); 
        return view('Dashboards.User',['posts'=>$posts]);
      }
}
