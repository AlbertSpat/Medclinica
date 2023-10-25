@extends("site/template")
@section("title","Наши врачи")
@section('content')

   <head><link rel="stylesheet" href="{{asset('css/doctor.css')}}"></head>

    <div class="container container-doct">
        @foreach($doctors as $doctor)
            <div class="col col-4 rowcoldoc card">
                <div class="rowdoct" >
                    <div class="rowdoctimg">
                    <img class="tovarimg" src="img/doc/{{$doctor->photo}}" alt="{{$doctor->last_name}}">
                    </div>
                    <div class="tovartext">
                        <b>Фамилия:</b> {{$doctor->last_name}}<br>
                        <b>Имя:</b> {{$doctor->first_name}}<br>
                        <b>Отчество:</b> {{$doctor->patronymic}}<br>
                        <b>Специальность:</b> {{$doctor->speciality->name}}<br><br> 
                        <a href="doctorview{{$doctor['id']}}" class="nav-link bg-light">Подробнее</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="inline-block-free">
        <div class="wrapper-text">
            <h1>Не откладывайте, запишитесь на консультацию уже сейчас!</h1>
            <p>Одним из удобных для вас способом</p>
        </div>
        <div class="wrapper-card">
        <div class="cardone">
            <img src="img/check.png" class="icon" alt="">
            <h5>Онлайн запись</h5>
            <a href="{{route('search.form')}}">
                <img src="img/onlinebookcons.png" class="onl" alt="">
            </a>
        </div>
        <div class="cardone">
            <img src="img/telephone.png" class="icon" alt="">
            <h5>По телефону</h5>
            <a href="tel:+79220181025" class="nav-link">
                <h5 class="underline-one">+79220181025</h5>
            </a>
        </div>
        <div class="cardone">
            <img src="img/email.png" class="icon" alt="">
            <h5>Через наши соц.сети</h5>
            <div class="gr">
            <a href="#Вконтакте">
                <img src="img/vk.png" class="onl3" alt="">
            </a>
            <a href="#Телеграм">
                <img src="img/telegram.png" class="onl3" alt="">
            </a>
            <a href="#Whatsapp">
                <img src="img/whatsapp.png" class="onl3" alt="">
            </a>
            </div>
        </div>
        </div>
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
