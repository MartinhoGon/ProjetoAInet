@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<!--<h1>{{$request->user->name}}</h1>
<table>
      <th>
            <p><b>Email:</b>
           {{$request->user->email}}</p>

       @if(is_null($user->phone))
       
       @else
            <p><b>Telemóvel:</b>
            {{$reqest->user->phone}}</p>
        @endif

           <p><b> Departamento:</b>
            {{$request->user->department->name}}
           </p>
            </th>
</table>
<br />-->

<table >
      <th>
      <p><b>Detalhes do pedido:</b>

      @if(!is_null($request->description))
          <p><b>Descrição do Pedido:</b>
          {{$request->description}}</p>
        @endif
            <p><b>Data do pedido:</b>
            {{$request->created_at}}</p>
      </th>
</table>
<br>
@if(Auth::user()->isAdmin())
    @if($rquest->status == 0)
        <form action="{{route('requests.concluirPedido', $request)}}" method="post" class="form-group">
            {{csrf_field()}}
        <div class="form-group">
                <button type="submit" class="btn-xs btn-success" name="ok">Concluir pedido</button>
        </div>
        <form action="{{route('users.recusarPedido', $request)}}" method="post" class="form-group">
        {{csrf_field()}}
        <div class="form-group">
                <button type="submit" class="btn-xs btn-danger" name="ok">Recusar pedido</button>
        </div>
    @endif
@endif
<a class="btn btn-primary" href="{{route('requests.showRequests')}}"> Voltar </a> 

@endsection
