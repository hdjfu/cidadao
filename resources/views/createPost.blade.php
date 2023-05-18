<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Postagem</title>
    <link rel="stylesheet" href="/css/createPost.css">
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">

</head>
<body>

    <form action="/postar" method="POST" enctype="multipart/form-data">
        <header>
           <a href="/"><img class="back" src="https://img.icons8.com/material-outlined/256/left.png" ></a> 

            <input type="submit" value="Enviar" class="enviar">
        </header>
        
    
        
        <div class="post">
            
            <img class="profileImgPost" src="https://i0.wp.com/www.followchain.org/wp-content/uploads/2021/09/best-discord-profile-pictures-6.png?resize=256%2C256&amp;ssl=1">
            <div class="content">
                <div class="postHeader">
                    <p class="name">{{ $name }}</p>
                    <img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png">
                </div>
                <div class="postContent">
                        @csrf    
                            <textarea name="descricao" id="textArea" rows="2" placeholder="Faça uma nova postagem!"></textarea>
                            <img src="#" id="prev" style="display: none">
                            <input type="file" name="image" id="image">
                            <script>
                                const imgPreview = document.getElementById('prev');
                                const fileInput = document.getElementById('image');

                                fileInput.addEventListener('change', function(event) {
                                    const file = event.target.files[0];
                                    if (file) {
                                    imgPreview.src = URL.createObjectURL(file);
                                    imgPreview.style.display = 'block'; // exibe a tag img caso haja uma imagem definida
                                    } else {
                                    imgPreview.style.display = 'none';// esconde a tag img caso não haja imagem definida
                                    }
                                });
                            </script>
                    <div id="poll" class="poll" style="visibility: hidden; height: 0px;">
                        <div>
                            <p>Opção 1</p>
                            <input id="op1" type="text" name="op1">
                        </div>
                        <div>
                            <p>Opção 2</p>
                            <input id="op2" type="text" name="op2">
                        </div>
                        
                        <button type="button" onclick="removePoll()">Remover enquete</button>
                    </div>
                </div>
                <div class="postFooter">
                    <div>
                        <label for="image" type="file">
                            <img src="https://img.icons8.com/material-sharp/256/image.png" alt="" srcset="">
                        </label>
                        <img id="pollButton" src="https://img.icons8.com/windows/256/poll-vertical.png" onclick="openPoll()">
                        <script>
                            var open = false;
                            var poll = document.getElementById("poll");
                            var pollButton = document.getElementById("pollButton");
                            function openPoll(){
                                if (open == false){
                                    open = true;
                                    poll.style = "";
                                    pollButton.style = "opacity: 0.3";
                                }
                            }
                            function removePoll(){
                                open = false
                                poll.style = "visibility: hidden; height: 0px;";
                                pollButton.style = "";

                                //clear Poll when close
                                var op1 = document.getElementById("op1");
                                var op2 = document.getElementById("op2");
                                op1.value = "";
                                op2.value = "";
                            }
                        </script>
                </div>
            
            </div>    
            <div class="tags">
                <button class="tag" type="button" onclick="addTag('Aviso')">#Aviso</button>
                <button class="tag" type="button" onclick="addTag('Noticias')">#Notícia</button>
                <button class="tag" type="button" onclick="addTag('Venda')">#Venda</button>
                <script>
                    var textArea = document.getElementById('textArea');
                    function addTag(tag){
                        textArea.value = textArea.value + ' #' + tag;
                    }
                </script>
            </div>
    
        </div>
    </form>
    <script>
        //Focus on textArea when load screen
        window.onload = function() {
            document.getElementById("textArea").focus();
        }


        const textarea = document.getElementById('textArea');
        textarea.addEventListener('input', autoResize);

        function autoResize() {
        this.style.height = 'auto'; // redefine a altura para que possa ser recalculada
        this.style.height = this.scrollHeight + 'px'; // ajusta a altura com base no conteúdo
        }
    </script>
    
</body>
</html>