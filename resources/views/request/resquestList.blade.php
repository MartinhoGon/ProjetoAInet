@extends('master')

@section('pageName', 'Lista de pedidos de impressão')

@section('content')

@include('partials.searchDetail')
{{-- @can('create', $requests)--}}
<div>
    <a class="btn btn-primary" href="{{route('requests.create')}}">Add request</a>
</div>
{{--@endcan --}}
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
        @foreach ($requests as $request)
        <tr>
            <td></td>
            <td>{{$request->id}}</td>
            <td>{{$request->user->name}}</td>
            <td>{{$request->user->department->name}}</td>
            <td>{{$request->typeToStr()}}</td>
            <td>{{$request->created_at}}</td>
            <td>
<<<<<<< HEAD
            <a class="btn" href="{{route('requests.showRequest', $request)}}"> Ver detalhes</a> 
            {{--@can('update', $requests)--}}
                <a class="btn btn-xs btn-primary" href="{{route('requests.edit', $request)}}">Edit</a>
                
                {{--@can('delete', $requests)--}}
                <form action="{{route('requests.destroy', $request)}}" method="POST" role="form" class="inline">
=======
            <a class="btn" href="{{route('requests.showRequest', ['request'=>$req])}}"> Ver detalhes</a> 
            {{--@can('update', $requests) --}}
                <a class="btn btn-xs btn-primary" href="{{route('requests.edit', $req)}}">Edit</a>
                {{--@endcan --}}
                {{--@can('delete', $requests) --}}
                <form action="{{route('requests.destroy', $req)}}" method="POST" role="form" class="inline">
>>>>>>> af6de5e4e4d72d008f8719bfa9854d25b490c969
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