<?php

namespace App\Http\Controllers;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllPost(){
        // return 'Get All Post';
        return response()->json(['message' => 'Getting All Post']);
    }

    public function getPost($id){
        // return 'Get post ' . $id;
        return response()->json(['message' => 'Get Post' . $id]);
    }

    public function addPost(){
        // return 'Add post';
        return response()->json(['message' => 'Add Post']);
    }

    public function editPost($id){
        // return 'Edit Post ' . $id;
        return response()->json(['message' => 'Edit post ' . $id]);
    }

    public function deletePost($id){
        // return 'Delete post ' . $id;
        return response()->json(['message' => 'Delete post ' . $id]);
    }

}
