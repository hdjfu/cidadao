<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Abaixo-Assinados</title>
    <link rel="stylesheet" href="/css/abaixo_Assinado.css">
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">
</head>
<body>

    
        <header>
            <a href="/"><img class="back" src="https://img.icons8.com/material-outlined/256/left.png" ></a> 
            <ul class="menu">
                <li><a href="/noticia">Noticia</a></li>
                <li><a href="/aviso">Aviso</a></li>
                <li><a href="/venda">Venda</a></li>
                <li><a href="/post_Enquetes">Enquetes</a></li>
                <li><a href="/post_Abaixo">Abaixo-Assinados</a></li>
            </ul>
            
        </header>
        
    
        
        <div class="post">
            
            <img class="profileImgPost" src="https://i0.wp.com/www.followchain.org/wp-content/uploads/2021/09/best-discord-profile-pictures-6.png?resize=256%2C256&amp;ssl=1">
            <div class="content">
                <div class="postHeader">
                    <p class="name">{{ $name }}</p>
                    <img class="options" src="https://cdn-icons-png.flaticon.com/512/17/17764.png">
                </div>
                <div class="postContent">
                    <form action="/postar_Abaixo" method="POST" enctype="multipart/form-data">
                            @csrf   
                            <label>Titulo do Abaixo-Assinados:</label> 
                            <textarea name="titulo" id="textArea" rows="3" ></textarea>
                            <label>Destinatarios do Abaixo-Assinados:</label> 
                            <textarea name="destinatario" id="textArea" rows="3" ></textarea>
                            <label>Declaração do Abaixo-Assinados:</label> 
                            <textarea name="descricao" id="textArea" rows="3" ></textarea>
                            <input type="submit" value="Criar Abaixo_Assinado" class="enviar">                        
                </div>  
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