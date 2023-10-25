@extends("site/template")
@section("title","Подробнее о товаре")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/register-login.css')}}"></head>

    <div class="container cont-reg">
        <h1>Редактирование профиля</h1>
        <form action="{{ route('update_profile') }}" method="POST" style="width:500px;">
            @csrf
            <input type="hidden" name="id" value="{{$users->id}}">
            <div class="row row-regt" style="width:600px;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Имя:</strong>
                        <input type="text" name="name" class="form-control"  value="{{$users->name}}">
                        @error('name')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Фамилия:</strong>
                        <input type="text" name="surname" class="form-control"  value="{{$users->surname}}" placeholder="Иванов">
                        @error('surname')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Отчество:</strong>
                        <input type="text" name="patronymic" class="form-control"  value="{{$users->patronymic}}" placeholder="Иванович">
                        @error('patronymic')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Полис:</strong>
                        <input type="text" name="police" class="form-control"  value="{{$users->police}}" placeholder="Полис">
                        @error('police')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Дата рождения:</strong>
                        <input type="date" name="bithday" class="form-control"  value="{{$users->bithday}}" placeholder="08.07.2000">
                        @error('bithday')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Пол:</strong>
                        <input type="text" name="pol" class="form-control"  value="{{$users->pol}}" placeholder="Пол">
                        @error('pol')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Адрес:</strong>
                        <input type="text" name="adres" class="form-control"  value="{{$users->adres}}" placeholder="Адрес">
                        @error('adres')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Телефон:</strong>
                        <input type="text" name="phone" class="form-control" value="{{$users->phone}}" placeholder="+7(8) 999 011 10 75">
                        @error('phone')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Пароль:</strong>
                        <input type="password" name="password" class="form-control" required placeholder="Новый пароль, если не хотите менять то Старый">
                        @error('password')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Изменить</button>
                </div>
                
            </div>
        </form>
    </div>

    <footer class="bd-footer py-4 py-md-5 mt-5 bg-dark">
  <div class="container py-4 py-md-5 px-4 px-md-3">
    <div class="row">
      <div class="col-6 col-lg-2 offset-lg-1 mb-4">
        <h5 class="title-fot">Помощь тут</h5>
        <ul class="list-unstyled mt-4">
          <li class="mb-4"><a href="#гдемы">Челябинск, ул. Набережная, 7</a></li>
          <li class="mb-4"><a href="tel:+79220181025">+79220181025</a></li>
          <li class="mb-4"><a href="#clinic@mail.ru">Clinic@mail.ru</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-4">
        <h5 class="title-fot">Последние новости</h5>
        <ul class="list-unstyled mt-4">
          <li class="mb-2">
            <div class="wrapper-card-foot">
            <a href="#" class="aeae">
            <img src="img/foot1.jpg" class="new-foot" alt="">
            <div class="wrapper-text-foot">
            <p>Школа будущих мам</p>
            <p class="date-foot">15.06.2022</p>
            </a>
            </div>
          </div>
        </li>
          <li class="mb-2">
            <div class="wrapper-card-foot">
                <a href="#" class="aeae">
                <img src="img/foot2.jpg" class="new-foot" alt="">
                    <div class="wrapper-text-foot">
                        <p>Школа будущих мам</p>
                        <p class="date-foot">13.06.2022</p>
                        </a>
                    </div>
          </li>
          <li class="mb-2">
            <div class="wrapper-card-foot">
                <a href="#" class="aeae">
                <img src="img/foot3.jpg" class="new-foot" alt="">
                    <div class="wrapper-text-foot">
                    <p>Школа будущих мам</p>
                    <p class="date-foot">11.05.2022</p>
                    </a>
                </div>
          </li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3 patient-right">
        <h5 class="title-fot">Пациентам</h5>
        <ul class="list-unstyled mt-4">
          <li class="mb-2"><a href="#">Памятка пациентам</a></li>
          <li class="mb-2"><a href="#">Права и обязанности граждан</a></li>
          <li class="mb-2"><a href="#">Лицензии</a></li>
          <li class="mb-2"><a href="#">Цены</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <ul class="list-unstyled mt-4 hrtte">
          <li class="mb-2"><a href="{{route('index')}}"><img src="img/logo.png" class="logo logo-in" alt=""></a></li>
          <li class="mb-2 mt-4"><a href="{{route('search.form')}}"><img src="img/onlinebookcons.png" class="onl" alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

@endsection

