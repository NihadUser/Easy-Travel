<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Auth</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('/client/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('/client/css/responsiveLogin.css')}}">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <img src="{{asset('/images/logo.svg')}}" alt="">
            <div class="container">
                
                        @guest
                            @if (Route::has('login'))
                                <li style="display: none;" class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li style="display: none;" class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @yield('content')
        </main>
    </div>
    <script>
        const btn = document.querySelectorAll(".fa-eye");
        const input = document.querySelector("#password")
        const input2 = document.querySelector("#password-confirm")
        for(let i=0;i<btn.length;i++){
            btn[i].addEventListener("click", () => {
                if (input.type == "password") {
                    input.type = "text"
                } else {
                    input.type = "password"
                }
                if (input2.type == "password") {
                    input2.type = "text"
                } else {
                    input2.type = "password"
                }
            })
        }
    </script>
    <script>
        const country = document.getElementById("country");
        fetch("https://restcountries.com/v2/all")
        .then((res) => res.json())
        .then((data) => {
            data.map((item) => {
            let option = document.createElement("option");
            option.textContent = item.name;
            option.setAttribute("value", item.name);
            country.append(option);
            });
        })
    </script>
</body>
</html>
