<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <!-- Styles -->
        <link href="/css/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <header>

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbar">
                        <a href="/" class="navbar-brand">
                            <img src="/images/mgaevents_logo.svg" alt="">
                        </a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="/" class="nav-link">
                                    Eventos
                                </a>
                            </li>
                            @auth
                            <li class="nav-item">
                                <a href="/events/create" class="nav-link">
                                    Criar Eventos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    Meus Eventos
                                </a>
                            </li> 
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a 
                                        href="/logout" 
                                        class="nav-link" 
                                        onclick="event.preventDefault();
                                            this.closest('form').submit()">
                                        Logout
                                    </a>
                                </form>
                            </li>   
                            @endauth
                            @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    Entrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">
                                    Cadastrar
                                </a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </header>
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @if(session('msg'))
                            <p class="msg">{{ session('msg') }}</p>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>

        
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <footer>
            <p>MGA Events &copy, 2024</p>
        </footer>
    </body>
</html>
