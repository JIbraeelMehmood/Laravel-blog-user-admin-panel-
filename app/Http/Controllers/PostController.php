<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use  App\Post;
use  App\User;
use  App\Category;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('post',['categories'=>$categories]);
        //
        //return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $user =$request-> user();
        $post =new Post;
        $post->title=$request->title;
        $string=implode(",",$request->postCategory);
        $post->category=$string;
        $post->body=$request->body;
        $user->post()->save($post);
        return redirect(route('postIndex'))->with('status','Post Added');
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
        $data = Crypt::decrypt($id);
        $post = Post::findOrFail($data);
        return view('postsshow', compact('post'));
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
        $data = Crypt::decrypt($id);
        $post=Post::find($data);
        return view ('editpost',['post'=>$post]);
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
        $data = Crypt::decrypt($id);
        $post=Post::find($data);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect(route('/admin_dashboard'))->with('status',$data.' Post Updated');
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
        Post::destroy($id);
        return redirect(route('/admin_dashboard'))->with('status',$id.' Post Delete');
    }
}
