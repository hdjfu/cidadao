<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;
    
    public function getComments($postId){
        return $this
        ->join('users', 'user_id', '=','users.id')
        ->select('comment', 'name','post_id', )
        ->where('post_id', '=', $postId)
        ->get();
    }
    public function postComment(Request $request){
        error_log("a: " . $request->descricao);

        $userId = Auth::user()->id;
        $postId = $request->post_id;
        $comment = $request->descricao;

        $this->insert([
            'user_id' => $userId,
            'post_id' => $postId,
            'comment' => $comment,
        ]);
    }
}
