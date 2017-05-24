@extends('master')

@section('pageName', 'Os nossos utilizadores')

@section('content')

@include('partials.search')

 <table class="table table-striped letra">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Mail</th>
            <th>Telemóvel</th>
            <th>Mais detalhes</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td> <a class="btn" href=""> Ver perfil </a> </td>
        </tr>
        @endforeach
</table>


@endsection