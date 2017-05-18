<!-- <!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <header>Olá projeto</header>
    </body>
</html> -->

@extends('master')

@section('pageName', 'Papelaria ESTG')

@section('content')

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!-- declara a linguagem a usar -->
    <head>
        <meta charset="utf-8">
    </head>    
    <body>
        <div class="auth">
            <a href="{{ url('/login') }}">Entrar</a>
        </div>
        <div class="auth">
            <a href="{{ url('/addAccount') }}">Registar conta</a>
        </div>
        <div class="auth">
            <a href="{{ url('/editAccount') }}">Editar conta</a>
        </div>
        <div class="fromDep">
             <!-- escolher gepartamento para estatistica -->
             <text> As nossas estatísticas </text>
            <label for="inputType">Seleciona um departamento para saber mais</label>
            <select name="type" id="inputType" class="form-control">
                <option value="0"> ESTG </option>
                <option value="1">Ciências Jurídicas</option>
                <option value="2">Ciências da Linguagem</option>
                <option value="3">Engenharia do Ambiente</option>
                <option value="4">Engenharia Civil</option>
                <option value="5">Engenharia Eletrotécnica</option>
                <option value="6">Engenharia Informática</option>
                <option value="7">Engenharia Mecânica</option>
                <option value="8">Gestão e Economia</option>
                <option value="9">Matemática</option>
            </select>
         </div>
         <div class=link>
            <a href="{{ url('/contactUsers') }}">Os nossos utilizadores</a>
        </div>
        <div class=link>
            <a href="{{ url('/dashboardRequests') }}">Dashboard: pedidos</a>
        </div>
        <div class=link>
            <a href="{{ url('/admin') }}">Administrar sistema</a>
        </div>
    </body>
</html>
@endsection