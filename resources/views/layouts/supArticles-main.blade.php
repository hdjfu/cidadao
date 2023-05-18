<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title> 
    <link rel="shortcut icon" href="/img/icon/favicon.png" type="image/x-icon">

    
    <!--Fonte do Google-->
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    
    <!--css bootstrap-->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!--css da pag-->
   
    <link rel="stylesheet" href="/css/supArticles-styles.css">

</head>
<body>
    
    <header>
        <a href="/suporte" target="_self" rel="prev">
            <img src="/logo.png" alt="logo do site">
            Central de Ajuda
        </a>
        
        <nav>
            
            <button>
                <a href="/feedback">Fale conosco</a>
            </button>
            
        </nav>
    </header>
    
    @yield('content')
   <footer>
        <p>CTS tm &copy; 2023</p>
   </footer>
   
</body>
</html>