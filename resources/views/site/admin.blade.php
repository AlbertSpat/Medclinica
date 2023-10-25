@extends("site/template")
@section("title","Администратор")
@section('content')

    <div class="container mt-3">
        <h1>Привет Админ, {{ Auth::user()->name }}!</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <hr>

        <div class="d-flex" style="width:80%; justify-content: space-between;">
                <button class="btn btn-success"><a class="nav-link" href="{{route('adddoc.adddoccreate')}}">Добавить доктора</a></button>
                <button class="btn btn-success ml-2"><a class="nav-link" href="{{route('addcabspec.addcabspeccreate')}}">Добавить кабинет или специальность</a></button>
                
                <button class="btn btn-success"><a class="nav-link" href="{{route('addschtt.addschttcreate')}}">Добавить расписание или время записи</a></button>
            </form>
        </div>

        <h2 class="mt-3">Таблица врачей</h2>

        <div style="display:flex; justify-content:center;">
        <table class="table" style="">
                <thead class="table-light" >
                <tr>
                    <th scope="doctor-id">id Доктора</th>
                    <th scope="name" >Имя</th>
                    <th scope="price">Фамилия</th>
                    <th scope="phone">Отчество</th>
                    <th scope="daterog">id специальности</th>
                    <th scope="date">id кабинета</th>
                    <th scope="categories">Фото</th>
                    <th scope="categories">Лицензии</th>
                    <th scope="id"> - </th>
                    <th scope="id"> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($doctors as $doctor)
                    <tr>
                        <form action="{{route('adminupdatedoctor', $doctor->id)}}" method="post">
                        @csrf
                        <th name="doctor-id" value="{{$doctor->id}}">{{$doctor->id}}</th>
                        <th scope="row"><input type="text" name="first_name" class="form-control"  value="{{$doctor->first_name}}"></th>
                        <th scope="row"><input type="text" name="last_name" class="form-control"  value="{{$doctor->last_name}}"></th>
                        <th scope="row"><input type="text" name="patronymic" class="form-control"  value="{{$doctor->patronymic}}"></th>
                        <td><input type="text" name="speciality_id" class="form-control"  value="{{$doctor->speciality_id}}"></td>
                        <td><input type="text" name="cabinet_id" class="form-control"  value="{{$doctor->cabinet_id}}"></td>
                        <td><input type="text" name="photo" class="form-control"  value="{{$doctor->photo}}"></td>
                        <td><input type="text" name="licenz" class="form-control"  value="{{$doctor->licenz}}"></td>
                        <td>
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </td>
                        </form>
                        <td>
                            <form action="{{route('admindeldoctor',$doctor->id)}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                </form>
                @endforeach

                </tbody>
            </table>
            </div>

            <div style="display:flex; flex-wrap:wrap; justify-content: space-evenly;">
            <div style="width:45%">
            <h2 >Таблица кабинетов</h2>  
            
        <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="name" >id - № Кабинета</th>
                    <th scope="price">этаж-floor</th> 
                    <th scope="id"> - </th>
                    <th scope="id"> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($cabinets as $cabinet)
                    <tr>
                    <form action="{{route('adminupdatecabinet', $cabinet->id)}}" method="post">
                        @csrf
                        <th scope="row">
                            <input type="text" class="form-control" name="cabinetid" value="{{$cabinet->id}}">
                        </th>
                        <td><input type="text" class="form-control" name="floor" value="{{$cabinet->floor}}"></td>  
                        <td>
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </td>
                        </form>
                        <td>
                            <form action="{{route('admindelcabinet',$cabinet->id)}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                </form>
                @endforeach

                </tbody>
            </table>
            </div>
                <div style="width:45%">
                <h2>Таблица специальностей</h2>
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th scope="name" >id</th>
                    <th scope="price">Специальность</th>
                    <th scope="id"> - </th>
                    <th scope="id"> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($specialities as $speciality)
                    <tr>
                    <form action="{{route('adminupdatespeciality', $speciality->id)}}" method="post">
                        @csrf
                        <th scope="row">{{$speciality->id}}</th>
                        <td><input type="text" class="form-control" name="specname" value="{{$speciality->name}}"></td>
                        <td>
                            <button type="submit" class="btn btn-success">Cохранить</button>
                        </td>
                        </form>
                        <td>
                            <form action="{{route('admindelspeciality', $speciality->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                </form>
                @endforeach

                </tbody>
            </table>
            </div>
            </div>

            <h2>Таблица расписания врача</h2>
            <div style="display:flex; justify-content:center;">
            

        <table class="table">
                <thead class="table-light">
                <tr>
                    <th>id</th>
                    <th>id-связь-доктор</th> 
                    <th>Понедельник</th> 
                    <th>Вторник</th>
                    <th>Среда</th>
                    <th>Четверг</th>
                    <th>Пятница</th>
                    <th>Суббота</th>
                    <th>Воскресенье</th>
                    <th> - </th>
                    <th> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($schedules as $schedule)
                    <tr>
                        <form action="{{route('adminupdateschedule', $schedule->id)}}" method="post">
                        @csrf
                        <th>{{$schedule->id}}</th>
                        <th><input type="number" class="form-control" name="doctoridschedule" value="{{$schedule->doctor_id}}"></th>
                        <td><input type="text" class="form-control" name="mon" value="{{$schedule->mon}}"></td>
                        <td><input type="text" class="form-control" name="tue" value="{{$schedule->tue}}"></td>
                        <td><input type="text" class="form-control" name="wed" value="{{$schedule->wed}}"></td>
                        <td><input type="text" class="form-control" name="thu" value="{{$schedule->thu}}"></td>
                        <td><input type="text" class="form-control" name="fri" value="{{$schedule->fri}}"></td>
                        <td><input type="text" class="form-control" name="sat" value="{{$schedule->sat}}"></td>
                        <td><input type="text" class="form-control" name="sun" value="{{$schedule->sun}}"></td>
                        <td>
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </td>
                        </form>
                        <td>
                            <form action="{{route('admindelschedule', $schedule->id)}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

    </div>
            
            
            <h2>Таблица записей - Активные</h2>

        <table class="table">
                <thead class="table-light">
                <tr>
                    <th>id</th>
                    <th>id-связь-доктора</th> 
                    <th>id-связь-user</th>
                    <th>id-связь-кабинет</th>
                    <th>дата</th>
                    <th>время</th>
                    <th> - </th>
                    <th> - </th>
                </tr>
                </thead>
                <tbody>

                @foreach($appointments as $appointment)
                    <tr>
                        <form action="{{route('adminupdateappointmentactive', $appointment->id)}}" method="post">
                        @csrf
                        <th>{{$appointment->id}}</th>
                        <th><input type="text" class="form-control" name="doctoridactive" value="{{$appointment->doctor_id}}"></th>
                        <td><input type="text" class="form-control" name="useridactive" value="{{$appointment->user_id}}"></td>
                        <td><input type="text" class="form-control" name="cabinetidactive" value="{{$appointment->cabinet_id}}"></td>
                        <td><input type="date" class="form-control" name="dateapp" value="{{$appointment->date}}"></td>
                        <td><input type="text" class="form-control" name="timeapp" value="{{$appointment->time}}"></td>
                        <td>
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </td>
                        </form>
                        <td>
                            <form action="{{route('admindelappointmentactive', $appointment->id)}}" method="get">
                            @csrf
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            <h2>Таблица записей - Cтарые записи</h2>
                    <div class="table-responsive">
                        <table class="table table-secondary">
                            <thead class="table-light">
                            <tr>
                                <th>id</th>
                                <th>id-связь-доктора</th> 
                                <th>id-связь-user</th>
                                <th>id-связь-кабинет</th>
                                <th>дата</th>
                                <th>время</th>
                                <th> - </th>
                                <th> - </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($appointmentslast as $appointmentl)
                            <tr>
                                <form action="{{route('adminupdateappointment', $appointmentl->id)}}" method="post">
                                @csrf
                                    <th>{{$appointmentl->id}}</th>
                                    <th><input type="text" class="form-control" name="doctoridpas" value="{{$appointmentl->doctor_id}}"></th>
                                    <td><input type="text" class="form-control" name="useridpas" value="{{$appointmentl->user_id}}"></td>
                                    <td><input type="text" class="form-control" name="cabinetidpas" value="{{$appointmentl->cabinet_id}}"></td>
                                    <td><input type="date" class="form-control" name="datepas" value="{{$appointmentl->date}}"></td>
                                    <td><input type="text" class="form-control" name="timepas" value="{{$appointmentl->time}}"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success">Сохранить</button>
                                    </td>
                                </form>
                                <td>
                                    <form action="{{route('admindelappointment', $appointmentl->id)}}" method="get">
                                    @csrf
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            
            
        @endsection


    </div>
