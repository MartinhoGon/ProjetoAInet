
@extends('master')

@section('pageName', 'Confirmar conta')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        <div class="auth">
            <text> Insira o código de confirmação que enviámos para o seu e-mail. </text>
        </div>
        <div class="auth">
            <label for="password" class="col-md-4 control-label">Código de confirmação</label>
             <input id="password" type="password" class="form-control" name="password" required>
        </div>
        <div class=auth>
            <button type="submit" class="btn"> Entrar </button>
        </div>
    </body>
</html>
@endsection