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
                                <form method="post" action="{{ route('ratings') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="score">Rating:</label>
                                        <br/>
                                        @for($i = 1; $i<=10;$i++)
                                            <label class="radio-inline"><input type="radio" name="score" id="score"
                                                                               value="{{$i}}">{{$i}}</label>
                                        @endfor
                                    </div>

                                    <div class="form-group">
                                        <label for="comment">Comment:</label>
                                        <textarea class="form-control" id="comment" name="comment"
                                                  placeholder="comment"></textarea>
                                    </div>
                                    
                                    <input type="hidden" id="location_id" name="location_id" value="{{$location->id}}"/>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection