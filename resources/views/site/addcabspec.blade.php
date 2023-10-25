@extends("site/template")
@section("title","Добавление кабинета или специальности")
@section("content")

    <head><link rel="stylesheet" href="{{asset('css/register-login.css')}}"></head>

    <div class="container cont-reg">
        <h1>Форма для добавления кабинета</h1>

        <form action="{{route('addcab.addcabstore')}}" method="POST" style="width: 100%; display:flex; flex-direction:column; margin-left:auto; margin-right:auto;">
            @csrf

            <div class="row " style="width: 50%; display:flex; margin-left:auto; margin-right:auto; margin-top:30px;">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>id - Номер кабинета:</strong>
                        <input type="text" name="id" class="form-control"  value="{{old('id')}}" placeholder="Номер кабинета">
                        @error('id')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Этаж:</strong>
                        <input type="text" name="floor" class="form-control"  value="{{old('floor')}}" placeholder="Номер этажа">
                        @error('floor')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Добавить кабинет</button>
                </div>
                
            </div>
        </form>

        <h1 style="width: 39%; display:flex; margin-left:auto; margin-right:auto; margin-top:40px;">Форма для добавления специальности</h1>

        <form action="{{route('addspec.addspecstore')}}" method="POST" style="width: 100%; display:flex; flex-direction:column; margin-left:auto; margin-right:auto;">
            @csrf

            <div class="row " style="width: 34%; display:flex; margin-left:auto; margin-right:auto; margin-top:30px;">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Название специальности:</strong>
                        <input type="text" name="name" class="form-control"value="{{old('name')}}" placeholder="Хирург">
                        @error('name')
                    <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Добавить специальность</button>
                </div>
                
            </div>
        </form>

    </div>

@endsection

