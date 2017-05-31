@extends('master')

@section('pageName', 'Lista de pedidos de impressão')

@section('content')

@include('partials.searchDetail')
{{-- @can('create', $requests) --}}
<div>
    <a class="btn btn-primary" href="{{route('requests.create')}}">Add request</a>
</div>
{{-- @endcan --}}
@if(count($requests))
 <table class="table table-striped letra">
    <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Nome do funcionário</th>
            <th>Departamento do funcionário</th>
            <th>Estado</th>
            <th>Data do pedido</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($requests as $req)
        <tr>
            <td></td>
            <td>{{$req->id}}</td>
            <td>{{$req->user->name}}</td>
            <td>{{$req->user->department->name}}</td>
            <td>{{$req->statusToStr()}}</td>
            <td>{{$req->created_at}}</td>
            <td>
            <a class="btn" href="{{route('requests.showRequest', ['request'=>$req])}}"> Ver detalhes</a> 
            {{--@can('update', $requests) --}}
                <a class="btn btn-xs btn-primary" href="{{route('requests.edit', $req)}}">Edit</a>
                {{--@endcan --}}
                {{--@can('delete', $requests) --}}
                <form action="{{route('requests.destroy', $req)}}" method="POST" role="form" class="inline">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                </form>
                {{--@endcan --}}
                
            </td>
        </tr>
        @endforeach
</table>
<div class="pagination"> {{$requests->links()}}</div>
@else
    <h2>No requests found</h2>
@endif
@endsection