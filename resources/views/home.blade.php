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
             <!-- escolher departamento para estatistica -->
             <text> As nossas estatísticas </text>
            <label for="inputType">Seleciona um departamento para saber mais</label>
            <select name="type" id="inputType" class="form-control">
            @foreach ($departments as $dep)
                     <option value=" {{$dep->id}}"> {{$dep->name}} </option>
             @endforeach
                <?= $lava->render('DonutChart', 'Coloracao', 'chart-div') ?>







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