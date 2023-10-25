@extends("site/template")
@section("title","Запись к врачу")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/addtable.css')}}"></head>

    <div class="profilec">
        <h1>Поиск нужного вам врача</h1>
        <div class="spec-search right">
            <h2>Поиск по специальности</h2> 
            <hr>
            <form action="{{route('speciality')}}" method="get">
                @csrf
            <strong>Выбрать специальность</strong>
            <select class="form-select" aria-label="Default select example" placeholder="-" name="speciality_id" >
                @foreach($specialities as $speciality)
                <option value="{{$speciality->id}}" >{{$speciality->name}}</option>
                @endforeach
            </select>
                <button class="btn-dark vbr" type="submit">Выбрать</button>
            </form>
        </div>

        <div class="spec-search">

            <h2 class="title-search-fam">Поиск по врачу</h2>
            <hr>
            <form class="vvodfam" action="{{route('search')}}" method="get">
                @csrf
            <strong>Введите фамилию</strong>
                <input class="input-group" type="text" name="last_name">
                <button class="btn-dark vbr" type="submit">Выбрать</button>
            </form>
        </div>

        <h2 class="title-table-alert">Результаты поиска</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


            <table class="table table-light">
                <thead class="table-dark">
                <tr>
                    <th scope="name" >Доктор</th>
                    <th scope="price">Номер кабинета</th>
                    <th scope="phone">Специальность</th>
                    <th scope="daterog">ПН</th>
                    <th scope="date">ВТ</th>
                    <th scope="categories">СР</th>
                    <th scope="id">ЧТ</th>
                    <th scope="id">ПТ</th>
                    <th scope="id">СБ</th>
                    <th scope="id">ВС</th>
                    <th scope="id"> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($doctors as $doctor)
                    <form action="{{route('record.form',['doctors'=>$doctor->id])}}" method="get">
                        @csrf
                    <tr>
                        <th scope="row">{{$doctor->first_name}} {{$doctor->last_name}} {{$doctor->patronymic}}
                            <input type="hidden" value="{{$doctor->id}}" name="doctor_id[]"></th>
                        <td>{{$doctor->cabinet_id}}</td>
                        <td>{{$doctor->speciality->name}}</td>
                        <td>{{$doctor->schedule->mon}}</td>
                        <td>{{$doctor->schedule->tue}}</td>
                        <td>{{$doctor->schedule->wed}}</td>
                        <td>{{$doctor->schedule->thu}}</td>
                        <td>{{$doctor->schedule->fri}}</td>
                        <td>{{$doctor->schedule->sat}}</td>
                        <td>{{$doctor->schedule->sun}}</td>
                        <td>
                            <button type="submit" class="btn btn-success">Записаться</button>
                        </td>
                    </tr>
                </form>
                @endforeach

                </tbody>
            </table>
            <!-- <b>Кол-во</b>
            <input type="textarea" name="description" >
            <input type="submit" value="Взять клиета(ов)"> -->


        <hr>
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
