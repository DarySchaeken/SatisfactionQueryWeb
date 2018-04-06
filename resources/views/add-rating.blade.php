@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Rating for {{$location->name}}</h1>
        </div>
        @auth
        <div class="row">Logout to add a rating to a location please!</div>
        @else
            <div class="row">
                <form method="post" action="{{ route('ratings') }}">
                    {{ csrf_field() }}
                    <label for="score">Rating:</label>
                    <br/>
                    @for($i = 1; $i<=10;$i++)
                        <label class="radio-inline"><input type="radio" name="score" id="score" value="{{$i}}">{{$i}}</label>
                    @endfor
                    <br/>
                    <label for="comment">Comment:</label>
                    <br/>
                    <textarea class="form-control" id="comment" name="comment" placeholder="comment"></textarea>
                    <br/>
                    <input type="hidden" id="location_id" name="location_id" value="{{$location->id}}"/>
                    <button type="submit">Submit</button>
                </form>
            </div>
            @endauth
    </div>
@endsection