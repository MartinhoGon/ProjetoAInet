@extends('master')

@section('pageName', 'Lista de pedidos de impressão')

@section('content')

@include('partials.searchDetail')

@can('create', App\Request::class)
<div>
    <a class="btn btn-primary" href="{{route('requests.create')}}">Add request</a>
</div>
@endcan

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
            <td>{{$request->statusToStr()}}</td>
            <td>{{$request->created_at}}</td>

            <td>
            <a class="btn" href="{{route('requests.showRequest', $request)}}"> Ver detalhes</a> 
            @if($request->status == 0)
                @can('update', $request)
                    <!-- <a class="btn btn-xs btn-primary" href="{{route('requests.edit', [$request, Auth::user()])}}">Edit</a>
                @endcan -->
                    <a class="btn btn-xs btn-primary" href="{{route('requests.edit', $request)}}">Edit</a>
                @endcan
                @can('delete', $request)
                    <form action="{{route('requests.destroy', $request)}}" method="POST" role="form" class="inline">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                    </form>
                @endcan 
            @endif
                
            </td>
        </tr>
        @endforeach
</table>
<div class="pagination"> {{$requests->links()}}</div>

@else
    <h2>No requests found</h2>
@endif

@endsection