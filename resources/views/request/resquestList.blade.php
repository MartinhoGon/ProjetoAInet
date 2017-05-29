@extends('master')

@section('pageName', 'Lista de pedidos de impressão')

@section('content')

@include('partials.searchDetail')
<div>
    <a class="btn btn-primary" href="{{route('requests.create')}}">Add request</a>
</div>
@if(count($requests))
 <table class="table table-striped letra">
    <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome do funcionário</th>
            <th>Departamento do funcionário</th>
            <th>Estado</th>
            <th>Tipo de folha</th>
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
            <td>
            <a class="btn" href="{{route('requests.showRequest', $requests)}}"> Ver Request </a> 
                <a class="btn btn-xs btn-primary" href="">Edit</a>
                <a action="{{route('requests.destroy', $requests)}}" method="POST" role="form" class="inline">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </a>
            </td>
        </tr>
        @endforeach
</table>
<div class="pagination"> {{$requests->links()}}</div>
@else
    <h2>No users found</h2>
@endif
@endsection