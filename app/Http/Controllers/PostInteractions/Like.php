<?php

namespace App\Http\Controllers\PostInteractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Models\Likes;
use App\Models\Dislikes;
use Exception;

class Like extends Controller
{
    public function like(Request $request){

        $likes = new Likes;

        $likes->like($request);    
    }

    public function removeLike(Request $request){

        $likes = new Likes;
        $likes->removeLike($request);
    }
}