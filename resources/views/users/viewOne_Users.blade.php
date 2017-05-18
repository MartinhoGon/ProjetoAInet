@extends('master')

@section('pageName', 'O Perfil')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Texto de apresentação:</label>
            <img class="img-circle" src="http://tudosobrecachorros.com.br/wp-content/uploads/precos-de-cachorro.png">
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Nome:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Email:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Telemóvel:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Depastamento:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Texto de apresentação:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Outras redes sociais:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
    </body>
</html>


@endsection