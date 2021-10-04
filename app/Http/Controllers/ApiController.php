<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Post;
use  App\User;
use  App\Rating;
use Validator;

class ApiController extends Controller
{
    //
    public function getAll() {
        // logic to get all students goes here
      }
  
      #public function create(Request $request) {
        // logic to create a student record goes here
       # $post = Post::create($request ->all());
       # return response()->json($post,201);
      #}

      public function create(Request $request) {
        // logic to create a student record goes here
       $validatedData = $request->validate([
        'title' => 'required|min:5',
        'body' => 'required|min:5',
      ]);
       # if($validatedData->fails())  
       #{
       #  return response()->json($validatedData->errors(),400);
       #}
        $post = Post::create($request ->all());
        return response()->json($post,201);
      }
  
      public function get($id) {
        // logic to get a student record goes here
        //return response()->json(Post::find($id),200);
        $post =Post::find($id);
        if(is_null($post)){
          return response()->json(["message" => 'Recode Not Found'],404);
        }
        return response()->json($post,200);
      }
  
      public function update(Request $request,$id) {
        // logic to update a student record goes here
        $postOBJ =Post::find($id);
        if(is_null($postOBJ)){
          return response()->json(["message" => 'Recode Not Found'],404);
        }
        $postOBJ->update($request->all());
        return response()->json($postOBJ,200);
      }
  
      public function delete(Request $request,$id) {
        // logic to delete a student record goes here
        $postOBJ =Post::find($id);
        if(is_null($postOBJ)){
          return response()->json(["message" => 'Recode Not Found'],404);
        }
        $postOBJ-> delete($id);
        return response()->json(null,204);
      }
}
