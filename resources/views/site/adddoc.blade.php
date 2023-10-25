@extends("site/template")
@section("title","Добавление доктора")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/register-login.css')}}"></head>

    <div class="container cont-reg">
        <h1>Форма для добавления доктора</h1>

        <form action="{{route('adddoc.adddocstore')}}" method="POST">
            @csrf

            <div class="row " style="width: 50%; display:flex; margin-left:auto; margin-right:auto;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>id:</strong>
                        <input type="text" name="id" class="form-control"  value="{{old('id')}}" placeholder="id">
                        @error('id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Имя:</strong>
                        <input type="text" name="first_name" class="form-control"  value="{{old('first_name')}}" placeholder="Иван">
                        @error('first_name')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Фамилия:</strong>
                        <input type="text" name="last_name" class="form-control"  value="{{old('last_name')}}" placeholder="Иванов">
                        @error('last_name')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Отчество:</strong>
                        <input type="text" name="patronymic" class="form-control"  value="{{old('patronymic')}}" placeholder="Иванович">
                        @error('patronymic')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Специальность:</strong>
                        <input type="number" name="speciality_id" class="form-control"  value="{{old('speciality_id')}}" placeholder="speciality_id">
                        @error('speciality_id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Кабинет:</strong>
                        <input type="number" name="cabinet_id" class="form-control"  value="{{old('cabinet_id')}}" placeholder="cabinet_id">
                        @error('cabinet_id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Фото:</strong>
                        <input type="text" name="photo" class="form-control"  value="{{old('photo')}}" placeholder="Фото имя файла">
                        @error('photo')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Адрес:</strong>
                        <input type="text" name="licenz" class="form-control"  value="{{old('licenz')}}" placeholder="Лицензия имя файла">
                        @error('licenz')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Добавить доктора</button>
                </div>
                
            </div>
        </form>
    </div>

@endsection

