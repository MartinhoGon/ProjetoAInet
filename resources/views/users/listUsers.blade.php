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
            <td> 
            <a class="btn" href="{{route('users.showUserPerfil', $user)}}"> Ver perfil </a> 
            <a class="btn btn-xs btn-primary" href="{{route('users.edit', $user)}}">Edit</a>
            @if($user->blocked == true)
                <a class="btn btn-xs btn-success" href="{{route('users.unblock', ['id' =>$user->id])}}">Unblock</a>
            @else
                <a class="btn btn-xs btn-danger" href="{{route('users.block', ['id' =>$user->id])}}">Block</a>
            @endif
                
            
          
            </td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$users->links()}}</div>

@endsection