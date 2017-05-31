@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<table class="table table-striped letra">
  <thead>
      <tr>
          <th></th>
          <th>Id</th>
          <th>Descrição</th>
          <th>Agrupamento de folhas</th>
          <th>Estado</th>
          <th>Tipo Folha</th>
          <th>Tamanho Folha</th>
          <th>Quantidade</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td></td>
          <td>{{$request->id}}</td>
          <td>{{$request->description}}</td>
          <td>{{$request->stapledToStr()}}</td>
          <td>{{$request->statusToStr()}}</td>
          <td>{{$request->tipoFolhaToStr()}}</td>
          <td>{{$request->tamanhoFolhaToStr()}}</td>
          <td>{{$request->quantity}}</td>
      </tr>
 </tbody> 
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
