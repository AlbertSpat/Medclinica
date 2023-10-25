@extends('site/template')
@section("title","Выбор времени и даты")
@section('content')

    <head><link rel="stylesheet" href="{{asset('css/addtable.css')}}"></head>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Запись ко врачу</h3>
                    </div>
                    <div class="card-body">
                        <p><span class="fw-bold">Врач: </span><span>{{$doctor[0]->last_name}} {{$doctor[0]->first_name}} {{$doctor[0]->	patronymic}}</span></p>
                        <p><span class="fw-bold">Специальность: </span><span>{{$doctor[0]->speciality->name}} </span></p>

                    </div>
                </div>

            </div></div>
        
        <div class="card my-4 mt-5">

            <div class="card-header">
                <h3>Расписание врача</h3>
            </div>
            <div class="card-body">
                @foreach($days as $day)

                <div class="row">
                    <div class="col-md-2 date-style">{{$day}} </div>
                    <div class="col-md-10" style="display: flex; flex-direction: row;">


                        @foreach($rasps as $rasp)

                                @if($day==$rasp->date)
                                    @if($rasp->user_id==NULL)
{{--                        <a class="badge bg-success" href="{{route('record')}}">{{$rasp->time}}</a>--}}
                                    <form action="{{route('succes')}}" method="post" >
                                        @csrf
                                        <button class="btn btn-recrod bg-success" type="submit">{{$rasp->time}}</button>
                                        <input type="hidden" name="time" value="{{$rasp->time}}">
                                        <input type="hidden" name="date" value="{{$rasp->date}}">
                                        <input type="hidden" name="doctor_id" value="{{$doctor[0]->id}}">
                        </form>
                                @else
                        <a class="bg-secondary btn btn-recrod" href="#">{{$rasp->time}}</a>
                                @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                    <hr>
                @endforeach

{{--                @for($i=0;$i<count($rasps);$i++)--}}
                {{--тут нужен другой массив, родительский--}}
               {{-- @foreach($raspsTru as $rasp)
                    @php

                    $datax = $rasp->date

                    @endphp--}}

              {{--  <div class="row">
                    <div class="col-md-2">{{$mon}} </div>
                    <div class="col-md-10">
                        @foreach($raspsMon as $rasp)
                       --}}{{-- @if($datax==$rasp->date)--}}{{--
                                @if($mon)
                        <a class="badge bg-success" href="success.html">{{$rasp->time}}</a>
                        @endif
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">   
                    <div class="col-md-2">{{$tue}} </div>
                    <div class="col-md-10">
                        @foreach($raspsTue as $rasp)
                            --}}{{-- @if($datax==$rasp->date)--}}{{--
                            @if($tue)
                                <a class="badge bg-success" href="success.html">{{$rasp->time}}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <hr>--}}
             {{--       @endforeach--}}
                {{--@endfor--}}
            </div>
        </div>
        <p><span class="badge bg-success p-2">08:00</span><span> - Время доступно для записи</span></p>
        <p><span class="badge bg-secondary p-2">08:00</span><span> - Время недоступно для записи</span></p>

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
