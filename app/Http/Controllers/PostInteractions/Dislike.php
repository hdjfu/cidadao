<?php

namespace App\Http\Controllers\PostInteractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dislike extends Controller
{
    public function disliked($postId, $userId){
        $disliked = DB::table('dislikes') //tabela pesquisada
        ->select('*') // [select * from dislikes]
        ->where('user_id', '=', $userId)
        ->where('post_id', '=', $postId)
        ->count();
        if($disliked == 1)
            return true;
        return false;
    }

    public function dislike(Request $request){
        //error_log("erro");
        
        $userId = Auth::user()->id;
        $postId = $request->post_id;

        if(! $this->disliked($postId, $userId)){ //Insere like na tabela de dislikes apenas se usuário não deu like antes
            DB::table('dislikes')->insert([
                'user_id' => $userId,
                'post_id' => $postId,
            ]);
        }
    }

    public function removeDislike(Request $request){
        $userId = Auth::user()->id;
        $postId = $request->post_id;


        if($this->disliked($postId, $userId)){ //Executa apenas se o usuário já deu dislike
            DB::table('dislikes')
            ->where('user_id', $userId)
            ->where('post_Id', $postId)
            ->delete();
            error_log("Dislike removido");
        }
    }
    
}
