@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>New location</h1>
        </div>
        @guest
        <div class="row">Login to add a location please!</div>
        @else
            <div class="row">
                <form method="post" action="/locations">
                    {{ csrf_field() }}
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name"/>
                    <button type="submit">Submit</button>
                </form>
            </div>
            @endguest
    </div>
@endsection