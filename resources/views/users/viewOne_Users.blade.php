@extends('master')

@section('pageName', 'O Perfil')

@section('content')

        <h1>
            {{$user->name}}
        </h1>
        <table>  
    <th>
        @if(is_null($user->profile_photo))
            <img class="img-circle" src="{{ asset('img/default.jpg'.$user->profile_photo)}}" height="200" width="200" style="box-shadow: 0px 0px 10px #888;">
        @else
            <img class="img-circle" src="{{ asset('storage/profiles/'.$user->profile_photo) }}" height="200" width="200" style="box-shadow: 0px 0px 10px #888;">
        @endif
      </th>
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

      @if(is_null($user->presentation))
       
       @else
            <p><b>Texto de apresentação:</b>
            {{$user->presentation}}</p>
         @endif
         
          @if(is_null($user->profile_url))
       
       @else
            <p><b>URL:</b>
            <a href="{{$user->profile_url}}">{{$user->profile_url}}</a>
      </p>
      @endif
      </th>

</table>

@endsection