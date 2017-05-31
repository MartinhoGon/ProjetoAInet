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
<br />
<a class="btn btn-primary" href="{{route('requests.showRequests')}}"> Voltar </a> 

@endsection
