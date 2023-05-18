<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Feed</title>
    <link rel="stylesheet" href="/css/feed.css">
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">

</head>
<body>
    
    <div id="menu">
        <ul>
          <li><button class="close" id="header" onclick="toggleMenu()">X</button></li>
          @guest
          <li><a href="/login">Entrar</a></li>
          <li><a href="/register">Registra-se</a></li>
          <li><a href="/suporte" target="_blank">Suporte</a></li>
          @endguest
          
          @auth
            <li><a href="/perfil">perfil</a></li>
            <li><a href="/suporte" target="_blank">Suporte</a></li>
            <li><a href="/configuracoes" target="_blank">Configurações</a></li>
                <form action="/logout" method="post">
                    @csrf
                    <input type="submit" value="sair">
                </form>
          @endauth
          
        </ul>
    </div>
    
        <header class="">
            @foreach($users as $user)
            
            @if ($user->capa == null)
                <img class="profileImgPost" src="/img/postagens/perfil.png" alt=""id="menu-button" class="menuButton">
                @endif
                @if ($user->capa=='Não tem capa')
                <img class="profileImgPost" src="/img/postagens/perfil.png" alt=""id="menu-button" class="menuButton">
                @endif
                @if($user->capa <> null && $user->capa<> 'Não tem capa')
            <img class="profileImgPost" src="/img/postagens/{{$user->capa}}"id="menu-button" class="menuButton">
            @endif
            @endforeach
            <ul class="topMenu">
            
                <div><li>Recentes</li><div class="menuSelect"></div></div>
                <div><li>Seu bairro</li><div class="menuSelect"></div></div>
                
            </ul>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </header>
        
        <main>
        
            <a href="/createPost">
                <div class="createPost">
                    <img src="https://img.icons8.com/external-outline-andi-nur-abdillah/256/external-Write-journalism-(outline)-outline-andi-nur-abdillah.png" alt="">
                </div>
            </a>
                
            <script> //Like Script
                function addLike(id, imgElem){
                    imgElem.className = "likeOn";
                    imgElem.src = "/img/icon/like-red.png";
                    var p = imgElem.nextElementSibling;
                    var pNumber = parseInt(p.innerHTML);
                    p.innerHTML = pNumber + 1;
                    p.style = "color: #e11717;"
            
                    // Habilita o botão novamente após um tempo
                    setTimeout(function () {
                        imgElem.disabled = false;
                    }, 100);
                    $.ajax({
                        type: 'POST',
                        url: '/like',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'post_id': id,
                        },
                    });
                }
                function removeLike(id, imgElem){
                    imgElem.className = "likeOff";
                        imgElem.src = "/img/icon/like.png";
                        var p = imgElem.nextElementSibling;
                        var pNumber = parseInt(p.innerHTML);
                        p.innerHTML = pNumber - 1;
                        p.style = "color: black;"
            
                        // Habilita o botão novamente após de tempo
                        setTimeout(function () {
                            imgElem.disabled = false;
                        }, 100);
                        $.ajax({
                            type: 'POST',
                            url: '/removeLike',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'post_id': id,
                            },
                        });
                }


                function addDislike(id, imgElem){
                    imgElem.className = "dislikeOn";
                    imgElem.src = "/img/icon/dislike-red.png";
                    var p = imgElem.nextElementSibling;
                    var pNumber = parseInt(p.innerHTML);
                    p.innerHTML = pNumber + 1;
                    p.style = "color: #e11717;"
            
                    // Habilita o botão novamente após um tempo
                    setTimeout(function () {
                        imgElem.disabled = false;
                    }, 100);
                    $.ajax({
                        type: 'POST',
                        url: '/dislike',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'post_id': id,
                        },
                    });
                }
                function removeDislike(id, imgElem){
                    imgElem.className = "dislikeOff";
                        imgElem.src = "/img/icon/dislike.png";
                        var p = imgElem.nextElementSibling;
                        var pNumber = parseInt(p.innerHTML);
                        p.innerHTML = pNumber - 1;
                        p.style = "color: black;"
            
                        // Habilita o botão novamente após de tempo
                        setTimeout(function () {
                            imgElem.disabled = false;
                        }, 100);
                        $.ajax({
                            type: 'POST',
                            url: '/removeDislike',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'post_id': id,
                            },
                        });
                }

                function like(id, imgElem) {
                    
                    if (imgElem.disabled) return; // Se o botão estiver desabilitado, não faz nada
                    imgElem.disabled = true; // Desabilita o botão para evitar cliques repetidos
                    if (imgElem.className == "likeOff") {
                        addLike(id, imgElem);
                    } else {
                        removeLike(id, imgElem);
                    }
                }
            </script>
            <script>//Dislike Script
                function dislike(id, imgElem) {
                    if (imgElem.disabled) return; // Se o botão estiver desabilitado, não faz nada
                    imgElem.disabled = true; // Desabilita o botão para evitar cliques repetidos
            
                    if (imgElem.className == "dislikeOff") {
                        addDislike(id, imgElem);
                    } else {
                        removeDislike(id, imgElem);
                    }
                }
            </script>
            <script>//Vote Script
                function vote(opPoll, id, op, votes1=0, votes2=0){

                    var poll = opPoll.parentNode;

                    var op1 = poll.firstElementChild;
                    var bar = op1.firstElementChild;
                    var text = op1.children[1];
                    var percent = op1.lastElementChild;

                    var op2 = poll.children[1];
                    var bar2 = op2.firstElementChild;
                    var text2 = op2.children[1];
                    var percent2 = op2.lastElementChild;


                    if(poll.classList.contains('voted')){

                    }else{
                        poll.classList.add('voted');
                        bar.classList.add('voted');
                        percent.classList.add('voted');


                        bar2.classList.add('voted');
                        percent2.classList.add('voted');


                        $.ajax({
                            type: 'POST',
                            url: '/vote',
                            data: {
                                '_token': '{{ csrf_token() }}',
                                'post_id': id,
                                'op' : op,
                            },
                        });

                        if(op == 1){
                            votes1 += 1;
                            console.log("add votes1")
                            text.style.fontWeight = '600';
                            bar.style.backgroundColor = '#f22'
                        }else{
                            votes2 +=1;
                            console.log("add votes2")
                            text2.style.fontWeight = '600';
                            bar2.style.backgroundColor = '#f22'
                        }
                        var percentNum;
                        if(votes1 == 0){
                            percentNum = 0;
                        }else if( votes2 == 0){
                            percentNum = 100;
                        }else{
                            percentNum = votes1 / (votes1 + votes2) *100;
                            percentNum = parseInt(percentNum);
                        }

                        
                            console.log("votes1: ", votes1)
                            console.log("votes2: ", votes2)
                            console.log(percentNum)

                            bar.style.width= percentNum + "%";
                            bar2.style.width= 100 - percentNum + "%";

                            percent.innerHTML = percentNum + "%";
                            percent2.innerHTML = 100- percentNum + "%";

                            var votos = op2.nextElementSibling.lastElementChild;
                            votos.textContent = parseInt(votos.textContent) + 1;;
                    }
                    

                    //var p = elem.nextElementSibling;

                }
                </script>
            
                @foreach ($posts as $post)
                <div class="post" id={{$post->id}}>
                    @if ($post->capa == null)
                    <img class="profileImgPost" src="/img/postagens/perfil.png" alt="">
                    @endif
                    @if ($post->capa=='Não tem capa')
                    <img class="profileImgPost" src="/img/postagens/perfil.png" alt="">
                    @endif
                    @if($post->capa <> null && $post->capa<> 'Não tem capa')
                <img class="profileImgPost" src="/img/postagens/{{$post->capa}}">
                @endif
                    <div class="content">
                        <div class="postHeader">
                            <p class="name">{{$post->name}}</p>
                            <img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png">
                        </div>
                        @if ($post->imagem == 'Não tem imagem')
                        
                            <div class="postContent">
                                <p class="postText">{{$post->descricao}}</p>
                            </div>
                        @else 
                            <div class="postContent">
                                <p class="postText">{{$post->descricao}}</p>
                                <div class="imgPost">
                                <img class="imgPost" src="/img/postagens/{{$post->imagem}}">
                                </div>
                            </div>                        
                        @endif
                        @if(isset($post->op1))

                        @php
                        if($post->voted == 1){
                            $voted = 'voted';
                        }
                        else{
                            $voted = '';
                        }
                        @endphp
                        <div class="poll {{$voted}}">

                            @php
                            $percent = 0;
                            if($post->votes2 == 0){
                                $percent = 100;
                            }else{
                                $percent = ($post->votes1 / ($post->votes2 + $post->votes1))*100;
                                $percent = intval($percent);
                            }


                            $barColor = '';
                            $barColor2 = '';
                            $textBold = '';
                            $textBold2 = '';
                            if($post->voted == 1){
                                if($post->op == 1){
                                    $barColor = 'background-color: #f22;';
                                    $textBold = 'font-weight: 600;';
                                } elseif ($post->op == 2) {
                                    $barColor2 = 'background-color: #f22;';
                                    $textBold2 = 'font-weight: 600;';
                                }
                            //echo "<h2>voted $post->op</h2>";
                            }
                            
                            @endphp

                            <div class="op" onclick="vote(this, {{$post->id}}, 1 ,{{$post->votes1}}, {{$post->votes2}})">
                                
                                <div class="pollBar {{$voted}}" style="width: {{$percent}}%; {{$barColor}}"></div>
                                <span class="opText {{$voted}}" style="{{$textBold}}">{{$post->op1}}</span>

                                <span class="opPercentage {{$voted}}">{{$percent}}%</span>
                            </div>

                            <div class="op" class="op" onclick="vote(this, {{$post->id}}, 2, {{$post->votes1}}, {{$post->votes2}})">
                                <div class="pollBar {{$voted}}" style="width: {{100 - $percent}}%; {{$barColor2}}"></div>
                                <span class="opText {{$voted}}" style="{{$textBold2}}">{{$post->op2}}</span>
                                <span class="opPercentage {{$voted}}">{{100 - $percent}}%</span>
                            </div>
                            <p><span>votos:&nbsp;</span><span>{{$post->votes1 + $post->votes2}}</span></p>
                        </div>
                        @endif
                        <div class="postFooter">
                            <div>
                                <img id="{{$post->id}}" 
                                    @if($post->liked == 0)
                                        class="likeOff"
                                        src="/img/icon/like.png"
                                    @else
                                        class="likeOn"
                                        src="/img/icon/like-red.png"
                                    @endif
                                
                                    onclick="like({{$post->id}}, this)"
                                >

                                <p 
                                    @if($post->liked == 1)
                                        style="color: #e11717"
                                    @endif
                                >
                                
                                {{$post->like_count}}</p>
                            </div>
                            <div>
                                <img id="{{$post->id}}" 
                                    @if($post->disliked == 0)
                                        class="dislikeOff"
                                        src="/img/icon/dislike.png"
                                    @else
                                        class="dislikeOn"
                                        src="/img/icon/dislike-red.png"
                                    @endif
                                
                                    onclick="dislike({{$post->id}}, this)"
                                >
                                <p 
                                    @if($post->disliked == 1)
                                        style="color: #e11717"
                                    @endif
                                >
                                {{$post->dislike_count}}</p>
                            </div>
                            
                            <div>
                                <a href="{{$post->id}}/comentarios">
                                    <img src="https://img.icons8.com/material-sharp/256/filled-topic.png" alt="" srcset="">
                                </a>
                                <p>{{$post->comments}}</p>
                            </div>
                                <img class="share" src="https://img.icons8.com/material-sharp/256/share.png" alt="">
                        </div>
                    </div>    
                </div>
                @endforeach
    </main>  



        <footer>
            <a href="/"><img src="https://img.icons8.com/ios-filled/256/home.png" alt=""></a>
            <a href=""><img src="https://img.icons8.com/ios-filled/256/search.png" alt=""></a>
            <a href="/notificacoes"><img src="https://img.icons8.com/material-outlined/256/appointment-reminders.png" alt=""></a>
        </footer>
        
        <script>
            //Open and close left menu
            //Open and close left menu
            var openMenu = false
            var menuButton = document.getElementById("menu-button");
            var menu = document.getElementById("menu");
            var closeMenuButton = document.getElementById("closeMenu")

            function toggleMenu() {
            if (!openMenu) {
            setTimeout(function() {
            menu.classList.add("open");
            }, 100); // Atraso
            openMenu = true;
            } else {
            menu.classList.remove("open");
            openMenu = false;
            }
            }

            menuButton.addEventListener("click", toggleMenu);

            closeMenuButton.addEventListener("click", function() {
            menu.classList.remove("open");
            openMenu = false;
            });



        </script>

</body>
</html>

