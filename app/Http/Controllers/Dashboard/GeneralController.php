<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Addfriend;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('Dashboards.General',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addFriend($id)
    {
        $data = Crypt::decrypt($id);
        $user_requested = Auth::user()->id; 
        $acceptor = $data;
        $addfriend = new Addfriend; 
        $addfriend -> user_requested =$user_requested;
        $addfriend -> acceptor =$acceptor;
        $addfriend -> save();
        return redirect(route('visiter'))->with('addfriend-status','Friend Request Send');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unfriend($id)
    {
        $decryptid = Crypt::decrypt($id);
        $data = DB::table('addfriends')->where('acceptor',$decryptid)->delete();
        return redirect(route('visiter'))->with('unfriend-status','Un Friend');
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
}
