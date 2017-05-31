@extends('master')

@section('pageName', 'Pedidos')

@section('content')

@include('administracao.searchAdmin')

 <table class="table table-striped letra">
    <thead>
        <tr>
        <th>Nome do Funcionario</th>
        <th>Departamento do Funcionario</th>
            <th>Description</th>
            <th>Data Limite</th>
            
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $request)
        <tr>
          <td>{{$request->user->name}}</td>
          <td>{{$request->user->department->name}}</td>
            <td>{{$request->description}}</td>
            <td>{{$request->due_date}}</td>
          
            <td>{{$request->statusToStr()}}</td>

        </tr>
        @endforeach
</table>

<div class="pagination"> {{$requests->links()}}</div>

@endsection