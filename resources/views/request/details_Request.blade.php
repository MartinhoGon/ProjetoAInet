@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

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
    @if($request->status == 0)
        <form action="{{route('requests.concluirPedido', $request)}}" method="post" class="form-group">
              {{csrf_field()}}
          <div class="form-group">
                  <button type="submit" class="btn-xs btn-success" name="ok">Concluir pedido</button>
          </div>
        </form>
        <form action="{{route('requests.recusarPedido', $request)}}" method="post" class="form-group">
          {{csrf_field()}}
          <div class="form-group">
                  <button type="submit" class="btn-xs btn-danger" name="ok">Recusar pedido</button>
          </div>
        </form>
    @endif
@endif
<a class="btn btn-primary" href="{{route('requests.showRequests')}}"> Voltar </a> 

@endsection
