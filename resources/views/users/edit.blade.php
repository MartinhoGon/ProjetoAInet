@extends('master')

@section('title', 'Edit user')

@section('content')
@if(count($errors) > 0)
    @include('partials.errors')
@endif

<form action="{{route('users.update', $user)}}" method="post" class="form-group">
    {{csrf_field()}}
    {{method_field('put')}}
    
<div class="form-group">
    <label for="inputFullname">Name</label>
    <input
        type="text" class="form-control"
        name="name" id="inputName"
        placeholder="Name" value="{{old('name', $user->name)}}" />
</div>

<div class="form-group">
    <label for="inputEmail">Email</label>
    <input
        type="email" class="form-control"
        name="email" id="inputEmail"
        placeholder="Email address" value="{{old('email', $user->email)}}"/>
</div>

<div class="form-group">
    <label for="inputPhone">Phone</label>
    <input
        type="number" class="form-control"
        name="phone" id="inputPhone"
        placeholder="Phone" value="{{old('phone', $user->phone)}}"/>
</div>

<div class="form-group">
    <label for="inputPassword">Password</label>
    <input
        type="password" class="form-control"
        name="password" id="inputPassword"
        placeholder="Password" value="{{old('password', $user->password)}}"/>
</div>

<div class="form-group">
    <label for="password-confirm">Confirm Password</label>
    <input
        type="password" class="form-control"
        name="password-confirm" id="password-confirm"
        placeholder="Password" value="{{old('password', $user->password)}}"/>
</div>

<div class="form-group">
    <label for="name">Departamento</label>
    <select class="form-control" name="department_id">                   
        <option disabled selected> -- select an option -- </option>
        @foreach ($departments as $dep)
            <option value=" {{$dep->id}}"> {{$dep->name}} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="inputFoto">Foto</label>
    <input
        type="file" class="form-control"
        name="profile_photo" id="inputFoto"
        placeholder="Foto" value="{{old('profile_photo', $user->profile_photo)}}" />
</div>

<div class="form-group">
    <label for="inputUrl">URL</label>
    <input
        type="url" class="form-control"
        name="url" id="inputUrl"
        placeholder="Url" value="{{old('profile_url', $user->profile_url)}}" />
</div>

<div class="form-group">
    <label for="inputPresentation">Presentation</label>
    <input
        type="text" class="form-control"
        name="presentation" id="inputPresentation"
        placeholder="Presentation" rows="4"
        value="{{old('presentation', $user->presentation)}}" />
</div>




    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a href="{{route('users.showUsers')}}" class="btn btn-default" name="cancel">Cancel</a>
    </div>
</form>
@endsection


