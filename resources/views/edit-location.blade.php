@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit location</h1>
        </div>
        @guest
        <div class="row">Login to modify a location please!</div>
        @else
            <div class="row">
                <form method="post" action="{{route('locations.update', [$location->id])}}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $location->name }}">
                    <button type="submit">Submit</button>
                </form>
            </div>
            @endguest
    </div>
@endsection