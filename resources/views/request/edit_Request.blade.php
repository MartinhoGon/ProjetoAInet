@extends('master')

@section('title', 'Edit request')

@section('content')
@if(count($errors) > 0)
    @include('partials.errors')
@endif

<form action="{{route('requests.update', $requests)}}" method="post" class="form-group">
    {{csrf_field()}}
    {{method_field('put')}}
    @include('request.add-edit_Request')
    <div class="form-group">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a href="{{route('requests.showRequests')}}" class="btn btn-default" name="cancel">Cancel</a>
    </div>
</form>
@endsection