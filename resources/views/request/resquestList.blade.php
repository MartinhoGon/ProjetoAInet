@extends('master')

@section('pageName', 'Lista de pedidos de impressão')

@section('content')

@include('partials.searchDetail')

 <table class="table table-striped letra">
    <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome do funcionário</th>
            <th>Departamento do funcionário</th>
            <th>Estado</th>
            <th>Tipo de Impressão</th>
            <th>Data do pedido</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $req)
        <tr>
            <td></td>
            <td>{{$req->id}}</td>
            <td>{{$req->user->name}}</td>
            <td></td>
            <td>{{$req->status}}</td>
            <td></td>
            <td>{{$req->created_at}}</td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$requests->links()}}</div>

@endsection