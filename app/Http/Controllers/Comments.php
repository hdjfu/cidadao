<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use Illuminate\Http\Request;

class Comments extends Controller
{
    public function getComments(request $request){
        $postId = $request->route('postId');
        $comments = new Comment;
        $comments = $comments->getComments($postId);
        $authId = Auth::id();
        $name = Auth::user()->name;
        return view('comments',['comments' => $comments, 'name' => $name, 'postId'=>$postId]);
    }
    public function postComment(Request $request){
        $asd = new Comment;
        $postId = $request->post_id;
        error_log("id: $request->post_id");
        $asd->postComment($request);

        //$c = $b->comment;
        //return $c;

        return Redirect::back();
    }
}
