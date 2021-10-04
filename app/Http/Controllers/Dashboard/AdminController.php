<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class AdminController extends Controller
{
    //
    public function __construct() 
      {
        $this->middleware('auth');
      }

      public function index()
      {
        return view('Dashboards.Admin');
      }

      public function blogRequest(Request $request)
      {
        $posts = Post::get();
        if($request->has('view_deleted'))
          {
            $posts = Post::onlyTrashed()->get();
          }
        #$posts = Post::onlyTrashed()->paginate(10);
        #return view('pages.admin-blogRequest', compact('posts'))->with('i', (request()->input('page', 1) - 1) * 10);
        return view('pages.admin-blogRequest', compact('posts'));
      }
  
      public function acceptBlog() 
      {

      }
//----------------------------------------------------------------------------------------
      public function denyBlog($id)
      {
        //$posts=Post::all();
        //return view('pages.admin-blogRequest',['posts'=>$posts]);
        Post::find($id)->delete();
        return back()->with('success', 'Post Deleted successfully');
      }
      public function restore($id)
      {
        Post::withTrashed()->find($id)->restore();
        return back()->with('success', 'Post Restore successfully');
      }
      public function restoreAll()
      {
        Post::onlyTrashed()->restore();
        return back()->with('success', 'All Post Restored successfully');
      }
      public function deletePermanently($id)
      {
          $project = Post::where('id', $id)->withTrashed()->first();
          $project->forceDelete();
          return redirect()->route('post.blogRequest')
            ->with('success', 'You successfully deleted the project fromt the Recycle Bin');
      }
//================================================================================
      public function userList() 
      {
        //$users=User::all();
        //return view('pages.admin-allUsers',['user'=>$users]);
        $user = User::get();
        return view('pages.admin-allUsers',compact('user'));
      }
   /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
      public function changeStatus(Request $request)
      {
          $user = User::find($request->user_id);
          $user->status = $request->status;
          $user->save();
          return response()->json(['success'=>'Status change successfully.']);
      }
}
