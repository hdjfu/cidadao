<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class Likes extends Model
{
    use HasFactory;

    public function liked($postId, $userId){

            $liked = $this //tabela pesquisada
            ->select('*') // [select * from likes]
            ->where('user_id', '=', $userId)
            ->where('post_id', '=', $postId)
            ->exists();
            if($liked == 1)
                return true;
            return false;
    }

    public function like(Request $request){
        //error_log("erro");
        
        $userId = Auth::user()->id;
        $postId = $request->post_id;

        $liked = $this->liked($postId, $userId);

        if($liked == false){ //Insere like na tabela de likes apenas se usuário não deu like antes
            $this->insert([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }
    }

    public function removeLike(Request $request){
        $userId = Auth::user()->id;
        $postId = $request->post_id;

        $liked = $this->liked($postId, $userId);
        if($liked){ //Executa apenas se o usuário já deu like
            
            $this
            ->where('user_id', $userId)
            ->where('post_Id', $postId)
            ->delete();
        }
    }
}