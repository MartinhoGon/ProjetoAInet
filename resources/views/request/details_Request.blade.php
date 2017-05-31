@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<table >
      <th>
      <h2><b>Detalhes do pedido:</h2>

      @if(is_null($request->description))
       
       @else
            <p><b>Descrição do Pedido:</b>
           {{$request->description}}</p>
        @endif
            <p><b>Data do pedido:</b>
            {{$request->created_at}}</p>

            <p><b>Numero de copias:</b>
            {{$request->quantity}}</p>

            <p><b>Tipo de tom:</b>           
                    <strong>
                        @if($request->colored === 0)
                            Preto e Branco
                        @elseif ($request->colored === 1)
                            Cores
                        @endif
                    </strong>
                </p>

            <p><b>Agrupamento de folhas:</b>
            <strong>
                        @if($request->stapled === 1)
                            Agrafadas
                        @elseif ($request->stapled === 0)
                            Sem agrafos
                        @endif
                    </strong></p>

            <p><b>Dimensão do papel:</b>
            <strong>
                        @if($request->paper_size === 4)
                            A4
                        @elseif ($request->paper_size === 3)
                            A3
                        @endif
                    </strong></p>


            <p><b>Tipo de papel:</b>
            <strong>
                        @if($request->paper_type === 1)
                            Normal
                        @elseif ($request->paper_type === 0)
                            Rascunho
                        @elseif($request->paper_type === 2)
                            Fotográfico
                        @endif
                    </strong></p>

            <p><b>Tipo de paginação:</b>
            <strong>
                        @if($request->front_back === 1)
                             Frente e verso
                        @elseif ($request->front_back === 0)
                            Página única
                        @endif
                    </strong></p>

            </th>

</table>
<br />
<a class="btn btn-primary" href="{{route('requests.showRequests')}}"> Voltar </a> 

@endsection
