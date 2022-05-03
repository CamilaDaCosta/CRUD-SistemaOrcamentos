<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- CSS - pasta public-->
        <link rel="stylesheet" href="/css/style.css">

        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <nav>
                <div>
                    <ul>
                        <li>
                            <a href="/" class="nav-link">Clientes</a>
                        </li>
                        <li>
                            <a href="/produto/showall" class="nav-link">Produtos</a>
                        </li>
                        <li>
                            <a href="/orcamento/showall" class="nav-link">Orçamentos</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <hr>

        <main>
            <div class="container-fluid">
                    {{-- yield = diretiva que determina a area do conteúdo --}}
                    @yield('content')
                </div>
            </div>
        </main><hr>

        <footer>
            <p>MeuCrud &copy; 2022</p>
        </footer>
        <!--script da pasta public-->
        <script src="/js/script.js"></script>
    </body>
</html>
