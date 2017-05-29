@extends('master')

@section('pageName', 'Detalhes do pedido')

@section('content')

<h1>{{$user->name}}</h1>
<table >
      <th>
            <p><b>Email:</b>
           {{$user->email}}</p>

       @if(is_null($user->phone))
       
       @else
            <p><b>Telemóvel:</b>
            {{$user->phone}}</p>
        @endif

           <p><b> Departamento:</b>
            {{$user->department->name}}
           </p>
            </th>
</table>
<br />

<table >
      <th>
      @if(is_null($request->description))
       
       @else
            <p><b>Descrição do Pedido:</b>
           {{$request->description}}</p>
        @endif

       @if(is_null($request->created_at))
       
       @else
            <p><b>Data do pedido:</b>
            {{$request->created_at}}</p>
        @endif

        <p><b>Detalhes do pedido:</b>
        @if(is_null($request->created_at))
       
       @else
            <p><b>Detalhes do pedido:</b>
            {{$request->created_at}}</p>
        @endif


            </th>

</table>
<br />
<a class="btn btn-primary" href="{{route('requests.showRequests')}}"> Voltar </a> 

@endsection
