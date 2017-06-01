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
            <td>
            @if(Auth::check() && Auth::user()->isAdmin())
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
            @endif
            
            </td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$users->links()}}</div>

@endsection