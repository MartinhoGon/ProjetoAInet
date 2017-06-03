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
            <td>
            @if(Auth::check() && Auth::user()->isAdmin())
                @if($comment->blocked == true)
                    <form action="{{route('comments.unblock', $comment)}}" method="post" class="form-group">
                        {{csrf_field()}}
                        <div class="form-group">
                                <button type="submit" class="btn-xs btn-success" name="ok">Unblock</button>
                        </div>
                    </form>
                @else
                    <form action="{{route('comments.block', $comment)}}" method="post" class="form-group">
                        {{csrf_field()}}
                        <div class="form-group">
                                <button type="submit" class="btn-xs btn-danger" name="ok">Block</button>
                        </div>
                    </form>
                @endif
                
            @endif
            </td>
        </tr>
        @endforeach
</table>

<div class="pagination"> {{$comments->links()}}</div>

@endsection