<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Perfil</title>
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/perfil.css">
    <link rel="stylesheet" href="/css/feed.css">
</head>
<body>
<a href="/"><img class="back" src="https://img.icons8.com/material-outlined/256/left.png" ></a> 
            <ul class="menu">
    <header>
        <div class="div-header">
            <img class="img-logo" src="/logo.png" alt="logo do site">        
            <h2>Cidadão Taboão</h2>
        </div>
    </header>
    <main>
        <div class="profile">
                    <!-- Foto -->
                    @foreach ($users as $user)
                        <div class="div-capa">
                            <span class="photo" title="Sua Foto" ><img class="photo" src="/img/postagens/{{$user->capa}}" alt=""></span>
                        </div>
                        
                    <!-- Sobre Você -->
                        <div class="grid-35">
                            <p class="perfil">{{$user->name}}</p>
                            <label for="description" class="sobre-você" value="{{$user->sobre_voce}}">{{$user->sobre_voce}}</label>
                        </div>
                   
                        <form action="/editar_perfil" method="GET">
                        <div>
                            <input type="submit" class="Btn" value="Editar" />
                        </div>
                </form>
        </div>
        <h1>Publicações:</h1>
        @foreach ($posts as $post)
        <div class="post" id={{$post->id}}>
            @if ($user->capa == null)
                <img class="profileImgPost" src="/img/postagens/perfil.png" alt="">
                @endif
                @if ($user->capa=='Não tem capa')
                <img class="profileImgPost" src="/img/postagens/perfil.png" alt="">
                
                @else
            <img class="profileImgPost" src="/img/postagens/{{$user->capa}}">
            @endif
            
            <div class="content_perfil">
                <div class="postHeader">
                    <p class="name">{{$user->name}}</p>
                    <a href="/editarpost/{{$post->id}}"><img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png"></a>
                </div>
                @if ($post->imagem == 'Não tem imagem')
                
                    <div class="postContent">
                        <p class="postText">{{$post->descricao}}<div class="imgPost">
                        </div>
                    </div>
                @else 
                    <div class="postContent">
                        <p class="postText">{{$post->descricao}}<div class="imgPost">
                        <img class="imgPost" src="/img/postagens/{{$post->imagem}}">
                        </div>
                    </div>                        
                @endif
            </div>    
        </div>
        @endforeach
        @endforeach
    </main>
</body>