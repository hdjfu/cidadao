<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PostInteractions\Dislike;
use App\Models\User;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Perfil;

class RedeControllers extends Controller
{
    public function index(){
        $authId = Auth::id();
        $posts = new Post;
        $posts = $posts->getPost($authId);
        $users = User::where('id', $authId)->get();
        return view('feed', ['posts' => $posts], ['users' => $users]);
    }
    
    public function perfil(){
        // select do perfil com where do id do usuario
        $id = Auth::id();
        $user = new User;
        $user = $user->show($id);
        
        
        // select dos posts com id do usuario
        $postagem = new Post;
        $postagem = $postagem->perfil($id);
        return view('perfil',['users' =>$user], ['posts'=> $postagem]) ;
        
    }
    public function editar_perfil(){
        // select do perfil com where do id do usuario
        $id = Auth::id();
        $user = new User;
        $user = $user->show($id);
        return view('editar_perfil',['users' =>$user]) ;

    }

    public function update(request $request){
        // pega as requisições e passa para uma variavel
    $perfil = $request->all();
    // se o usuario colocar uma foto na capa continua, e caso não tenha vai para o else
        
        $user = new User;
        
        // pega o id do usuario logado
        $id = Auth::id();   
        $user = $user->updatePerfil($id, $perfil, $request);
        
        
       return redirect('/perfil');
    
    
    
}
    }