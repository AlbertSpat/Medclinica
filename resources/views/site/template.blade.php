<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}}">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <style>
        
        .link{
            margin-left: 20px;
        }
        .aufth{
            font-weight: 600;
            margin-right: 10px;
        }
        .navbar{
            background-color: #e3f2fd;
        }
        .containermine{
            min-width:100%;
            width: 100%;
            margin: 0;
            padding:0;
        }
        .dropdown-toggle, .nav-link{
            font-size: 18px;
        }
        a {
            color: white;
        }
        a:hover, .link:hover {
            color:gray;
        }
        .dropdown-menu{
            position: relative; /* Абсолютное позиционирование */
            margin-left: 20px;
            margin-bottom: 25px;
            margin-right: 0;
            margin-top: 0;
            height: 70px;
            padding: 0;
        }
        .navbar{
            padding: 0 180px 0 180px;
            height: 70px;
        }
        .logo{
            width: 70px;
        }
        .authru{
            margin-left: 45%;
        }
        .underline-one {
            position: relative;
            cursor: pointer;
        }
        .underline-one:after {
            content: "";
            display: block;
            position: absolute;
            right: 0;
            bottom: -3px;
            width: 0;
            height: 1px; /* Высота линии */
            background-color: black; /* Цвет подчеркивания при исчезании линии*/
            transition: width 0.5s; /* Время эффекта */
        }

        .underline-one:hover:after {
            content: "";
            width: 100%;
            display: block;
            position: absolute;
            left: 0;
            bottom: -3px;
            height: 2px; /* Высота линии */
            background-color: #137ae8; /* Цвет подчеркивания при появлении линии*/
            transition: width 0.5s;  /* Время эффекта */
        }
    </style>
  <div class="container containermine">
      <nav class="navbar navbarmine navbar-expand-sm navbar-light">
          <div class="container-fluid">
              <a class="navbar-brand" href="{{route('index')}}"><img src="img/logo.png" class="logo" alt=""></a>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <a class="link nav-link underline-one" href="{{route('index')}}">Главная</a>
                  <a class="link nav-link underline-one" href="{{route('doctors')}}">Наши врачи</a>
                        @guest
                        <div>
                          <a class="link link-rrr nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Авторизация</a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{route('loginForm') }}">Вход</a></li>
                              <li><a class="dropdown-item" href="{{route('register.create')}}">Регистрация</a></li>
                          </ul>
                        </div>
                        @endguest
                          <a class="link nav-link underline-one" href="{{route('search.form')}}">Запись на приём</a>

                  <form class="d-flex authru">
                      @auth()
                        <a class="link-danger link nav-link aufth underline-one"  href="{{ route('logout') }}">Выйти</a>

                        @if(Auth::user()->isAdmin())
                            <a class="link-info nav-link aufth underline-one" href="{{ route('admin') }}">Кабинет администратора</a>
                        @else
                            <a class="link-info nav-link aufth underline-one" href="{{ route('profile') }}">Личный кабинет</a>
                        @endif
                    @endauth
                  </form>


              </div>
          </div>
      </nav>

    @yield('content')
  </div>
</body>
<script src = "{{ asset('css/bootstrap.min.js')}}" ></script>


</html>

