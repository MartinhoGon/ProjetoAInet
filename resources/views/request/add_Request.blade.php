@extends('master')

@section('title', 'Add request')

@section('content')
@if(count($errors) > 0)
    @include('partials.errors')
@endif

<form action="{{route('requests.store')}}" method="post" class="form-group" enctype="multipart/form-data">
    {{csrf_field()}}
    @include('request.add-edit_Request')

<div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Add</button>
        <a class="btn btn-default" href="{{route('requests.showRequests')}}">Cancel</a>
    </div>
</form>
@endsection
