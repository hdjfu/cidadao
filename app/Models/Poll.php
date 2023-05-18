<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    public function hasPoll($postId){

        $liked = $this //tabela pesquisada
        ->select('*') // [select * from likes]
        ->where('post_id', '=', $postId)
        ->exists();
        if($liked == 1)
            return true;
        return false;
    }

    public function getPoll(){
        
    }
}
