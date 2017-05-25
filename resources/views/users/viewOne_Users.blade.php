@extends('master')

@section('pageName', 'O Perfil')

@section('content')

@foreach ($users as $user)

        <h1>
            {{$user->name}}
        </h1>
        <table>  
    <th>
        @if(is_null($user->profile_photo))
            <img src="{{ asset('img/default.jpg'.$user->profile_photo)}}">
        @else
            <img src="{{ asset('storage/profiles/'.$user->profile_photo) }}">
        @endif
      </th>
      <th>
            <p><b>Email:</b>
           {{$user->email}}</p>
       
            <p><b>Telemóvel:</b>
            {{$user->phone}}</p>
        
           <p><b> Departamento:</b>
            {{$user->department->name}}
           </p>

    
            <p><b>Texto de apresentação:</b>
            {{$user->presentation}}</p>
        
            <p><b>Outras redes sociais:</b>
            <a href="{{$user->profile_url}}">{{$user->profile_url}}</a>
      </p>
      </th>

</table>

@endforeach

@endsection