@extends("site/template")
@section("title","Создание новой заявки")
@section("content")

<head><link rel="stylesheet" href="{{asset('css/doctor.css')}}"></head>

    <div class="row g-3 p-5 content-cont">
        <h1 class="p-3" style="text-align: center">{{$doctors['last_name']}} {{$doctors['first_name']}} {{$doctors['patronymic']}}</h1>
            <img src="img/doc/{{$doctors->photo}}" alt="{{$doctors->last_name}}" class="photo_doc">
                <div class="col-md-8 fs-3 text-align-veiwe">
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Специальность: {{$doctors->speciality->name}}</label>
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Кабинет: {{ $doctors['cabinet_id'] }}</label>
                    </div>
                    <div class="col-md-12">
                        <label for="inputPassword4" class="form-label">Этаж: {{ $doctors->cabinet['floor'] }}</label>
                    </div>
                    <div class="col-md-12">
                        <form action="{{route('record.form',['doctors'=>$doctors->id])}}" method="get">
                            @csrf
                        <tr>
                            <th scope="row">
                                <input type="hidden" value="{{$doctors->id}}" name="doctor_id[]"></th>
                            <td>
                                <button type="submit" class="btn-success">Записаться</button>
                            </td>
                        </tr>
                    </form>
                    </div>
                    <div class="col-md-12 mt-1">
                        <label for="inputPassword4" class="form-label"><b>Лицензии</b></label>
                        <div>
                        <a href="img/{{$doctors->licenz}}"><img src="img/{{$doctors->licenz}}" alt="" style="height:200px;"></a>
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
