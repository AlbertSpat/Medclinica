@extends("site/template")
@section("title","Запись к врачу")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/addtable.css')}}"></head>

    <div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Запись ко врачу</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Доктор</h4>
                            <p><span class="fw-bold">ФИО: </span><span>{{$doctor[0]->last_name}} {{$doctor[0]->first_name}} {{$doctor[0]->	patronymic}}</span></p>
                            <p><span class="fw-bold">Специальность: </span><span>{{$doctor[0]->speciality->name}}</span></p>
                            <p><span class="fw-bold">Дата: </span><span>{{$date}}</span></p>
                            <p><span class="fw-bold">Время: </span><span>{{$time}}</span></p>
                            <p><span class="fw-bold">Номер кабинета: </span><span>{{$doctor[0]->cabinet->id}}</span></p>
                        </div>
                        <div class="col-md-6">
                            <h4>Пациент</h4>
                            <p><span class="fw-bold">Фамилия: </span><span>{{Auth::user()->surname}}</span></p>
                            <p><span class="fw-bold">Имя: </span><span>{{Auth::user()->name}}</span></p>
                            <p><span class="fw-bold">Отчество: </span><span>{{Auth::user()->patronymic}}</span></p>
                            <p><span class="fw-bold">Номер полиса: </span><span>{{Auth::user()->police}}</span></p>
                            <p><span class="fw-bold">Дата рождения: </span><span>{{Auth::user()->bithday}}</span></p>
                        </div>
                    </div>
                    <div class="float-end float-end-tr">
                        <form action="{{route('record')}}" method="post">
                            @csrf
                        <a class="btn btn-secondary" href="{{route('index')}}">Отменить</a>
                        <a class="btn btn-secondary" href="{{ URL::previous() }}">Назад</a>
                            <button class="btn btn-success" type="submit">Подтвердить запись</button>
                            <input type="hidden" name="time" value="{{$time}}">
                            <input type="hidden" name="date" value="{{$date}}">
                            <input type="hidden" name="doctor_id" value="{{$doctor[0]->id}}">
                        </form>
                    </div>
                </div>
            </div>

        </div></div>

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
