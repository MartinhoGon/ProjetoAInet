@extends('master')

@section('pageName', 'Comentarios')

@section('content')

@include('administracao.searchAdmin')

 <table class="table table-striped letra">
    <thead>
        <tr>
            <th>id</th>
            <th>Comentario</th>
            <th>Bloqueado</th>
            <th>Request Id</th>
            <th>Utilizador</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->comment}}</td>
            <td>{{$comment->blocked}}</td>
            <td>{{$comment->request_id}}</td>
            <td>{{$comment->user->name}}</td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$comments->links()}}</div>

@endsection