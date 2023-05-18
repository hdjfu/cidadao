<?php
use App\Models\post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedeControllers;
use App\Http\Controllers\Comments;
use App\Http\Controllers\PostInteractions\Like;
use App\Http\Controllers\PostInteractions\Dislike;
use App\Http\Controllers\PostInteractions\VoteController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\EventController;
use App\Http\Controllers\postController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// rotas das postagens 
route::post('/postar', [postController::class,'postar']);
Route::middleware([ 
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    route::get('/', [RedeControllers::class,'index'])->name('feed');
    route::get('/createPost', [postController::class,'createPost']);
});
route::get('/noticia', [postController::class,'createNoticia']);

route::get('/post_Abaixo', [postController::class,'createAbaixo']);
route::post('/postar_Abaixo',[postController::class,'abaixo']);


route::get('/{postId}/comentarios', [Comments::class,'getComments']);
route::post('/comment', [Comments::class,'postComment']);

//route::get('/', [RedeControllers::class,'index']);

route::post('/like', [Like::class,'like']);
route::post('/removeLike', [Like::class,'removeLike']);
route::post('/dislike', [Dislike::class,'dislike']);
route::post('/removeDislike', [Dislike::class,'removeDislike']);

route::post('/vote', [VoteController::class,'vote']);

//Rotas que é necessário estar logado
//caso não estiver, será redirecionado para fazer login




route::get('/suporte', function (){
    return view('support');
});
route::get('/suporte/artigo', function (){
    return view('supArticles');
    
});
route::get('/feedback', function (){
    return view('feedback');
    
});
route::get('/notificacoes', function (){
    return view('notificacoes');
    
});
route::get('/configuracoes', function (){
    return view('configuracoes');
});
route::get('/configuracoesConta', function (){
    return view('configuracoesConta'); 
});
route::get('/configuracoes/notificacoes', function (){
    return view('notificacaoConfig'); 
});



route::get('/perfil', [RedeControllers::class,'perfil']);
route::get('/editar_perfil', [RedeControllers::class,'editar_perfil']);
route::put('/perfil/update/{id}', [RedeControllers::class,'update']);
// route::put('/perfil/update',function(){
//     $id = Auth::id();
//         $users = User::where('id', $id)->get();
//         return view('perfil',['users' =>$users]) ;
//     // return view('/perfil');
// });

