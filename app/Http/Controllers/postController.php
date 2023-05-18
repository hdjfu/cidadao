<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostInteractions\Dislike;
use App\Models\User;
use App\Models\Post;
use App\Models\Poll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perfil;

class postController extends Controller
{
    public function postar(request $request, User $user){
        
        $postar = new post;
        $postar -> user_id = auth::user()->id;
        $postar -> descricao = $request ->descricao;
        $postar -> categoria = '1';


        

        if (isset($request->image)){
            if($request->hasFile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/postagens'), $imageName);

                $postar->imagem = $imageName;
    
            }
        }else{
            $postar->imagem = 'Não tem imagem';
        }
        
        // $postar -> imagem = $request->image;
        $postar->categoria = "Categoria demo";
        $postar ->save();

        $poll = new poll;

        if($request -> op1 != "" and $request -> op2 != ""){

            $poll->post_id = $postar->id;

            $poll-> op1 = $request -> op1;
            $poll-> op2 = $request -> op2;
            $poll->save();
            error_log("op1:" . $poll->op1);
        }else{
            error_log("missing");
        }

    
        return redirect('/');
    }
    
    public function createPost(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('createPost', ['name' => $name]);
    }
    public function createNoticia(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('createNoticia', ['name' => $name]);
    }public function createAviso(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('createAviso', ['name' => $name]);
    }public function createVenda(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('createVenda', ['name' => $name]);
    }public function createEnquete(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('enquete', ['name' => $name]);
    }public function createAbaixo(){
        $name = Auth::user()->name; //Obter o nome do usuário atual logado
        return view('abaixo_assinado', ['name' => $name]);
    }
}
