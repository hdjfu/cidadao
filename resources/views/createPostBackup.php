 
<header>
        @guest
            <a href="/login">Entrar</a>
            <a href="/register">Registra-se</a>
        @endguest
</header>

<main>

    <div class="novaPostagem">
        <div class="novaPostagemPerfil">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
            <p>João Silva</p>
        </div>
        <form action="/postar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="image">
            <input type="text" placeholder="Faça uma nova postagem!" class="novoTexto" name="descrição">
            <input type="submit" value="Enviar" class="enviar">
        </form>
    </div>



    
    @foreach ($posts as $post)
    <div class="post">
        <div class="perfil">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="">
            <p>Pedro Almeida</p>
        </div>
        <img src="/img/postagens/{{$post->imagem}}" alt="">
        <p class="texto">{{$post->descrição}}</p>
        <div class="acoes">
        <i class="fa fa-envelope-o" aria-hidden="true"></i><p>7</p>
            <i class="fa fa-thumbs-up" aria-hidden="true"></i><p>19</p>
        </div>
    </div>
    @endforeach
    
    
</main>
