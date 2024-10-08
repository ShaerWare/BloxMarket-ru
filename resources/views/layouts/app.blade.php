<html lang="{{ app()->getLocale() }}">

<head>
    @vite('resources/js/app.js')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Токен CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> </title>
    <!-- Скрипты -->
    <script src=" " defer></script>
    <!-- Шрифты -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">
    <!-- Стили -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!—Левая сторона панели навигации -->
                        <ul class="navbar-nav mr-auto"></ul>

                        <!—Правая сторона панели навигации -->
                            <ul class="navbar-nav ml-auto">
                                <!—Ссылки для аутентификации -->
                                    @guest
                                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @else
                                        <li><a class="nav-link" href="{{ route('futers.index') }}">{{ __('Управление
                                                футером') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('users.index') }}">{{ __('Управление
                                                пользователями') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('roles.index') }}">{{ __('Настройка ролей') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('category.index') }}">{{ __('Категории товаров') }}</a></li>
                                        <li><a class="nav-link" href="{{ route('products.index') }}">{{ __('Управление
                                                товарами') }}</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                            </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
