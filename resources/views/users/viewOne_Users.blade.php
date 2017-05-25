@extends('master')

@section('pageName', 'O Perfil')

@section('content')

@foreach ($users as $user)

        <div class="auth">
            <label for="text" class="col-md-4 control-label">Nome:</label>
            <label for="text" class="col-md-4 control-label">*buede cenas a aparecer que vamos buscar*</label>
        </div>
        <div class="auth">
            <label for="text" class="col-md-4 control-label">Nome:</label>
            <img class="img-circle" src="http://tudosobrecachorros.com.br/wp-content/uploads/precos-de-cachorro.png">
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
            <label for="text" class="col-md-4 control-label">Departamento:</label>
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

@endforeach

@endsection