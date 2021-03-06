@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Rating for {{$location->name}}
                    </div>

                    <div class="card-body">
                        @auth
                            <div class="row">Logout to add a rating to a location please!</div>
                        @else
                            <div class="row">
                                <form method="post" action="{{ route('ratings.update',[$rating->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <div class="form-group">
                                        <label for="score">Rating:</label>
                                    </div>

                                    <div class="form-group">
                                        @for($i = 1; $i<=10;$i++)
                                            <label class="radio"><input type="radio" name="score" id="score"
                                                                               value="{{$i}}"
                                                                               @if($i == $rating->score)
                                                                               checked="checked"
                                                        @endif
                                                >{{$i}}</label>
                                        @endfor
                                    </div>

                                    <div class="form-group">
                                        <label for="comment">Comment:</label>
                                        <textarea class="form-control" id="comment"
                                                  name="comment">{{$rating->comment}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="location_id" name="location_id" value="{{$location->id}}"/>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div class="row">
                                <form action="{{route ('ratings.destroy_id',[$rating->id])}}" method="post">
                                    {!! csrf_field() !!}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection