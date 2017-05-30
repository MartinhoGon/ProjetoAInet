@extends('master')

@section('pageName', 'Os nossos utilizadores')

@section('content')

@include('administracao.searchAdmin')

 <table class="table table-striped letra">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Mail</th>
            <th>Telemóvel</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$users->links()}}</div>

@endsection