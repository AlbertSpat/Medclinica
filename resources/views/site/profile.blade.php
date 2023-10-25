@extends("site/template")
@section("title","Подробнее о товаре")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>Мой личный кабинет</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <span class="fw-bold">Фамилия: </span><span>{{Auth::user()->surname}} {{Auth::user()->name}} {{Auth::user()->patronymic}}</span>
                            </p>
                            <p>
                                <span class="fw-bold">Дата рождения: </span><span>{{Auth::user()->bithday}}</span>
                            </p>
                            <p>
                                <span class="fw-bold">Телефон: </span><span>{{Auth::user()->phone}}</span>
                            </p>
                            <p>
                                <span class="fw-bold">Номер полиса: </span><span>{{Auth::user()->police}}</span>
                            </p>
                            <p>
                                <span class="fw-bold">Адрес: </span><span>{{Auth::user()->adres}}</span>
                            </p>
                            <form action="{{ route('update_profileForm', Auth::user()->id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input name="status" type="submit" class="btn btn-outline-success" value="Редактировать">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mt-1">
        <div class="col-md-11 mt-2">
            <div class="card">
                <div class="card-header">
                    <h3>Посещения</h3>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Планируемые посещения</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Номер талона</th>
                                <th>Дата приема</th>
                                <th>Время приема</th>
                                <th>Доктор</th>
                                <th>Специальность</th>
                                <th>Номер кабинета</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id}}</td>
                                <td>{{ $appointment->date}}</td>
                                <td>{{ $appointment->time}}</td>
                                <td>{{ $appointment->doctor->last_name}} {{ $appointment->doctor->first_name}} {{ $appointment->doctor->patronymic}}</td>
                                <td>{{ $appointment->doctor->speciality->name}}</td>
                                <td>{{$appointment->doctor->cabinet->id}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="record/{{$appointment->id}}">Отменить</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <h5 class="card-title">Последние посещения поликлиники</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Номер талона</th>
                                <th>Дата приема</th>
                                <th>Время приема</th>
                                <th>Доктор</th>
                                <th>Специальность</th>
                                <th>Номер кабинета</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointmentslast as $appointment)
                            <tr>
                                <td>{{ $appointment->id}}</td>
                                <td>{{ $appointment->date}}</td>
                                <td>{{ $appointment->time}}</td>
                                <td>{{ $appointment->doctor->last_name}} {{ $appointment->doctor->first_name}} {{ $appointment->doctor->patronymic}}</td>
                                <td>{{ $appointment->doctor->speciality->name}}</td>
                                <td>{{$appointment->doctor->cabinet->id}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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


