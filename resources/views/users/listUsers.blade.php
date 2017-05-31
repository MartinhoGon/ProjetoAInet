@extends('master')

@section('pageName', 'Os nossos utilizadores')

@section('content')

<table class="pull-right">
    <tr>
        <td>
            <div class="btn-group col-md-pull-12">
                <button class="btn letra">Ver departamento:</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                    <ul class="dropdown-menu">
                        <li>
                            @foreach ($departments as $dep)
                                <a href="{{route('users.groupDepartment')}}" <option value=" {{$dep->id}}"> {{$dep->name}} </option></a>
                            @endforeach
                        </li>
                    </ul>
            </div>
        </td>
        <td>
            <div class="btn-group col-md-pull-9">
                <button class="btn letra">Ordenar por:</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                    <ul class="dropdown-menu">
                        <li>

                            <a   class="letra" href="{{route('users.orderName')}}">Nome</a>
                            <a   class="letra" href="{{route('users.orderDepartment')}}">Departamento</a>

                        </li>
                    </ul>
            </div>
        </td>
    </tr>
</table>

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
            @can('update', $user)
                <a class="btn btn-xs btn-primary" href="{{route('users.edit', $user)}}">Edit</a>
            @endcan
            {{-- @if(Auth::user()->isAdmin())
                @if($user->blocked == true)
                <form action="{{route('users.unblock', $user)}}" method="post" class="form-group">
                    {{csrf_field()}}
                    <div class="form-group">
                            <button type="submit" class="btn-xs btn-success" name="ok">Unblock</button>
                    </div>
                </form>
                @else
                    <form action="{{route('users.block', $user)}}" method="post" class="form-group">
                        {{csrf_field()}}
                        <div class="form-group">
                                <button type="submit" class="btn-xs btn-danger" name="ok">Block</button>
                        </div>
                    </form>
                @endif
                @if($user->admin == true)
                    <form action="{{route('users.takeAdmin', $user)}}" method="post" class="form-group">
                            {{csrf_field()}}
                        <div class="form-group">
                                <button type="submit" class="btn-xs btn-danger" name="ok">Retirar Admin</button>
                        </div>
                    </form>
                @else
                    <form action="{{route('users.giveAdmin', $user)}}" method="post" class="form-group">
                        {{csrf_field()}}
                        <div class="form-group">
                                <button type="submit" class="btn-xs btn-success" name="ok">Tornar Admin</button>
                        </div>
                    </form>
                @endif
            @endif --}}
            </td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$users->links()}}</div>

@endsection