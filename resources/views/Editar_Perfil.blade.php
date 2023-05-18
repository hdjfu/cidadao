<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Editar_Perfil.css">
    <link rel="stylesheet" href="/css/feed.css">
    <title>Editar Perfil</title>
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">

</head>
<body>
    <header>
    <div class="div-header">
            <img class="img-logo" src="/logo.png" alt="logo do site">        
            <h2>Cidadão Taboão</h2>
    </div>
    </header>
    <main>
        <div class="profile">
            <div>
                @foreach ($users as $user)
                <form action="/perfil/update/{{$user->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Foto -->
                        <div class="div-capa">
                            <label for="capa" class="btn">trocar Capa</label>
                            <input type="file" name="capa" id="capa" value="{{$user->capa}}"/>
                            <label for="photo" class="photo" title="Adicionar nova foto!"><img class="photo" src="/img/postagens/{{$user->capa}}" alt=""></label>
                            <input type="file" name="photo" id="photo">
                        </div>
                    <!-- Sobre Você -->
                        <div class="grid-35">
                            <p class="perfil">{{$user->username}}</p>
                            <label for="description" class="sobre-você">Sobre voçê:</label>
                            <textarea name="sobre_voce" id="" cols="30" rows="auto" tabindex="3" placeholder="{{$user->sobre_voce}}" value="{{$user->sobre_voce}}"></textarea>
                        </div>
                        <div>
                            <input type="button" class="Btn cancel" value="Cancelar" onclick="history.back()"/>
                            <input type="submit" class="Btn" value="Salvar" />
                        </div>
                </form>
                @endforeach
            </div>
        </div>
    </main>
</body>