@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Edit location
                    </div>

                    <div class="card-body">
                        @guest
                            <div class="row">Login to modify a location please!</div>
                        @else
                            <div class="row">
                                <form method="post" action="{{route('locations.update', [$location->id])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ $location->name }}">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>

                            <div class="row">
                                <form method="post" action="{{route ('ratings.destroy', [$location->id])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger">Delete all for this location</button>
                                </form>
                            </div>

                            </br>
                            <div class="row">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Comment</th>
                                        <th>Score</th>
                                        <th></th>
                                    </tr>
                                    @foreach($ratings as $rating)
                                        <tr>
                                            <td>{{$rating->comment}}</td>
                                            <td>{{$rating->score}}</td>
                                            <td>
                                                <form action="{{route ('ratings.destroy_id',[$rating->id])}}"
                                                      method="post">
                                                    {!! csrf_field() !!}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest
    </div>
@endsection