@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<table class="table table-striped letra">
  <thead>
      <tr>
          <th></th>
          <th>Id</th>
          <th>Estado</th>
          @if (isset($request->refused_reason))
            <th>Motivo</th>
          @endif
          <th>Descrição</th>
          <th>Agrupamento de folhas</th>
          <th>Tipo de cor</th>
          <th>Tipo Folha</th>
          <th>Tamanho Folha</th>
          <th>Nº de cópias</th>
          <th>Paginação</th>
          <th>Data do pedido</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td></td>
          <td>{{$request->id}}</td>
          <td>{{$request->statusToStr()}}</td>
          @if (isset($request->refused_reason))
            <td>{{$request->refused_reason}}</td>
          @endif
          <td>{{$request->description}}</td>
          <td>{{$request->stapledToStr()}}</td>
          <td>{{$request->colorToStr()}}</td>
          <td>{{$request->tipoFolhaToStr()}}</td>
          <td>{{$request->tamanhoFolhaToStr()}}</td>
          <td>{{$request->quantity}}</td>
          <td>{{$request->paginacaoToStr()}}</td>
          <td>{{$request->created_at}}</td>
      </tr>
 </tbody> 
</table>
<br>
@if(Auth::user()->isAdmin())
    @if($request->status == 0)
        <form action="{{route('requests.concluirPedido', $request)}}" method="post" class="form-group">
          {{csrf_field()}}
          <div class="form-group">
            <select name="printer_id" id="printer_id" class="form-control">
              <option value = "0" selected disabled> Impressora usada</option>
                  @foreach ($printers as $printer)
                      <option  value="{{$printer->id}}">{{$printer->name}}</option>
                  @endforeach
            </select>
          </div>
          <div class="form-group">
                  <button type="submit" class="btn-xs btn-success" name="ok">Concluir pedido</button>
          </div>
        </form>
        <form action="{{route('requests.recusarPedido', $request)}}" method="post" class="form-group">
          {{csrf_field()}}
          <div class="form-group">
              <label for="inputDescription">Motivo</label>
              <input
                  type="text" class="form-control"
                  name="refused_reason" id="inputMotivo"
                  placeholder="Motivo"/>
          </div>
          <div class="form-group">
                  <button type="submit" class="btn-xs btn-danger" name="ok">Recusar pedido</button>
          </div>
        </form>
    @endif
@endif
<a class="btn btn-primary" href="{{route('requests.showRequests', Auth::user())}}"> Voltar </a> 

<div class="form-group">
              <label for="inputDescription">Comments:</label>
              <input
                  type="text" class="form-control"
                  name="refused_reason" id="inputMotivo"
                  placeholder="Motivo"/>
          </div>

@endsection
