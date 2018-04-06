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
                <form method="post" action="{{ route('ratings.update',[$rating->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <label for="score">Rating:</label>
                    <br/>
                    @for($i = 1; $i<=10;$i++)
                        <label class="radio-inline"><input type="radio" name="score" id="score" value="{{$i}}"
                        @if($i == $rating->score)
                           checked="checked"
                        @endif
                            >{{$i}}</label>
                    @endfor
                    <br/>
                    <label for="comment">Comment:</label>
                    <br/>
                    <textarea class="form-control" id="comment" name="comment">{{$rating->comment}}</textarea>
                    <br/>
                    <input type="hidden" id="location_id" name="location_id" value="{{$location->id}}"/>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="row">
                <form action="{{route ('ratings.destroy_id',[$rating->id])}}" method="post">
                    {!! csrf_field() !!}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn-danger">DELETE</button>
                </form>
            </div>
            @endauth
    </div>
@endsection