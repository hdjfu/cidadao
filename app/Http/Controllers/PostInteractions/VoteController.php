<?php

namespace App\Http\Controllers\PostInteractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
class VoteController extends Controller
{
    public function vote(Request $request){

        $votes = new Vote;
        $votes->vote($request);
    }
}
