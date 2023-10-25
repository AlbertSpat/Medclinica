@extends("site/template")
@section("title","Добавление расписания или время записи")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/register-login.css')}}"></head>

    <div class="container cont-reg">
        <h1>Форма для добавления расписания</h1>

        <form action="{{route('addsch.addschstore')}}" method="POST" style="width: 100%; display:flex; flex-direction:column; margin-left:auto; margin-right:auto;">
            @csrf

            <div class="row " style="width: 50%; display:flex; margin-left:auto; margin-right:auto; margin-top:30px;">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>id-связь-доктора</strong>
                        <input type="number" name="doctor_id" class="form-control"  value="{{old('doctor_id')}}" placeholder="id">
                        @error('doctor_id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Понедельник:</strong>
                        <input type="text" name="mon" class="form-control"  value="{{old('mon')}}" placeholder="8:00-13:00|14:00-19:00">
                        @error('mon')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Вторник:</strong>
                        <input type="text" name="tue" class="form-control"  value="{{old('tue')}}" placeholder="8:00-13:00|14:00-19:00">
                        @error('tue')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Среда:</strong>
                        <input type="text" name="wed" class="form-control"  value="{{old('wed')}}" placeholder="8:00-13:00|14:00-19:00">
                        @error('wed')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Четверг:</strong>
                        <input type="text" name="thu" class="form-control"  value="{{old('thu')}}" placeholder="8:00-13:00|14:00-19:00">
                        @error('thu')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Пятница:</strong>
                        <input type="text" name="fri" class="form-control"  value="{{old('fri')}}" placeholder="8:00-13:00|14:00-19:00">
                        @error('fri')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Суббота:</strong>
                        <input type="text" name="sat" class="form-control"  value="{{old('sat')}}" placeholder="-|8:00-13:00|14:00-19:00">
                        @error('sat')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Воскресенье:</strong>
                        <input type="text" name="sun" class="form-control"  value="{{old('sun')}}" placeholder="-|8:00-13:00|14:00-19:00">
                        @error('sun')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Добавить расписание врача</button>
                </div>
                
            </div>
        </form>

        <h1 style="width: 40%; display:flex; margin-left:auto; margin-right:auto; margin-top:40px;">Форма для добавления времени записи</h1>

        <form action="{{route('addtt.addttstore')}}" method="POST" style="width: 100%; display:flex; flex-direction:column; margin-left:auto; margin-right:auto;">
            @csrf

            <div class="row " style="width: 34%; display:flex; margin-left:auto; margin-right:auto; margin-top:30px;">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>id-связь-доктора:</strong>
                        <input type="text" name="doctor_id" class="form-control" value="{{old('doctor_id')}}" placeholder="id">
                        @error('doctor_id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Число:</strong>
                        <input type="date" name="date" class="form-control" value="{{old('date')}}">
                        @error('date')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Название специальности:</strong>
                        <select class="form-select" aria-label="Default select example" name="time">
                            <option value="-">-</option>
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                        </select>
                        @error('time')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Добавить время записи</button>
                </div>
                
            </div>
        </form>

    </div>

@endsection

