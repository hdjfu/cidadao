

<link rel="stylesheet" href="/css/feed.css">
<style>
        header{
            margin-top: 0px;
            display: flex;
            padding: 15px;
        }


            .back{
            margin-right: auto;
            width: 35px;
        }
        .enviar{
            margin-left: auto;
            padding: 0px 25px;
            
            border-radius: 20px;
            background-color: red;
            border: none;

            font-weight: 800;
            font-size: 16px;
            color: white;
        }



        textarea{
            padding: 2px;
            /*caret-color: black;*/
            outline: 0;
            border: none;
            font-size: 20px;
            font-weight: 400;
            width: 95%;    
            resize: none;
            background-color: transparent;
        }
        textarea:focus{
            outline: 0;
        }
</style>

<title>Comentários</title>
    
        <header>
            <a href="/">
                <img class="back" src="https://img.icons8.com/material-outlined/256/left.png">
            </a>
        </header>
        <main>
            <form action="/comment" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="post">
                    <img class="profileImgPost" src="https://i0.wp.com/www.followchain.org/wp-content/uploads/2021/09/best-discord-profile-pictures-6.png?resize=256%2C256&amp;ssl=1">
                    <div class="content">
                        <div class="postHeader">
                            <p class="name">{{$name}}</p>
                            <img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png">
                        </div>
                        <div class="postContent">
                            <textarea name="descricao" id="textArea" rows="2" placeholder="Faça uma nova postagem!"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{$postId}}">
                        <input type="submit" value="Enviar" class="enviar">
                    </div>
                </div>
            </form>
        <script>
            window.onload = function() {
                document.getElementById("textArea").focus();
            }

            const textarea = document.getElementById('textArea');
            textarea.addEventListener('input', autoResize);

            function autoResize() {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            }
        </script>
    


    @foreach($comments as $comment)
        <div class="post" id="53">
            <img class="profileImgPost" src="/img/postagens/perfil.png">
            <div class="content">
                <div class="postHeader">
                    <p class="name">{{$comment->name}}</p>
                    <img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png">
                </div>
                
                <div class="postContent">
                    <p class="postText">{{$comment->comment}}</p>
                </div>   
            </div>
        </div>
    @endforeach
    
</main>
