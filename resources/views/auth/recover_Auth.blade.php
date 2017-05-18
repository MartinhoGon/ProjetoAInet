
@extends('master')

@section('pageName', 'Recuperar palavra-passe')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        <div class="auth">
            <text> Insira o seu e-mail. Enviar-lhe-emos um código para possa continuar a operação. </text>
        </div>
        <div class="auth">
             <label for="email" class="col-md-4 control-label">E-Mail</label>
              <input id="email" type="email" class="form-control" name="email" required>
        </div>
        <div class=auth>
            <button type="submit" class="btn"> Recuperar </button>
        </div>
    </body>
</html>
@endsection