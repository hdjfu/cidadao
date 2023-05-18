<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Vote extends Model
{
    use HasFactory;
    public function voted($postId, $userId){
        $voted = $this //tabela pesquisada
        ->select('*') // [select * from likes]
        ->where('user_id', '=', $userId)
        ->where('post_id', '=', $postId)
        ->exists();
        if($voted == 1)
            return true;
        return false;
    }
    public function vote(Request $request){

        $postId = $request->post_id;
        $userId = Auth::user()->id;
        $op = $request->op;

        $voted = $this->voted($postId, $userId);
        if($voted == false){
            $this->insert([
                'user_id' => $userId,
                'post_id' => $postId,
                'op' => $op
            ]);
        }
    }
}
