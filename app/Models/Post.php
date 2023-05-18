<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Post extends Model
{
    use HasFactory;

    

    public function getPost($authId){
        



        $posts = $this //Nome da tabela a ser buscada [select from posts] 
        ->join('users', 'posts.user_id', '=','users.id') //join
        ->join('like_count', 'posts.id', '=', 'like_count.post_id')//Obter quantidade de likes
        ->join('dislike_count', 'posts.id', '=', 'dislike_count.post_id')//Obter quantidade de dislikes
        ->leftjoin('polls', 'polls.post_id', '=', 'posts.id')
        ->leftjoin('votes', 'votes.post_id', '=', 'posts.id')
        //->join('dislike_count','posts.id', '=', 'post_id')
        ->select('posts.id', 'name','capa', 'descricao', 'imagem', 'like_count', 'dislike_count', 'op1', 'op2', 'votes.op',
            DB::raw('(SELECT COUNT(*) FROM likes WHERE post_id = posts.id AND user_id = ' . $authId . ') as liked'),
            DB::raw('(SELECT COUNT(*) FROM dislikes WHERE post_id = posts.id AND user_id = ' . $authId . ') as disliked'),
            DB::raw('(SELECT COUNT(*) FROM votes WHERE post_id = posts.id AND user_id = ' . $authId . ') as voted'),
            DB::raw('(SELECT COUNT(*) FROM votes WHERE post_id = posts.id AND op=1) as votes1'),
            DB::raw('(SELECT COUNT(*) FROM votes WHERE post_id = posts.id AND op=2) as votes2'),
            DB::raw('(SELECT COUNT(*) FROM comments WHERE post_id = posts.id) as comments'),

        )


        
        //Colunas a serem pesquisadas 
        ->get();

        $posts = $posts->reverse(); //Inverter a ordem do select

        return $posts;
    }
//     public function autor(){
//  return $this->belongsTo(User::class, 'user_id', 'id');
    public function perfil($id){
        $posts = Post::where('user_id',$id)->get();
        $posts = $posts->reverse(); 
        return $posts;
}
}
