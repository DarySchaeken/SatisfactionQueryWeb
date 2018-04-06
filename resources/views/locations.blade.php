@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Locations</h1>
        </div>
        <div class="row">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                @auth
                    <tr>
                        <td></td>
                        <td><a href="{{url ('/locations/create')}}">Add location</a></td>
                    </tr>
                @endauth
                @foreach($locations as $location)
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->name}}</td>
                        @auth
                        <td>
                            <form action="{{route ('locations.edit',[$location->id])}}" method="get">
                                {!! csrf_field() !!}
                                <button type="submit" class="btn-primary">Modify</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route ('locations.destroy',[$location->id])}}" method="post">
                                {!! csrf_field() !!}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn-danger">DELETE</button>
                            </form>
                        </td>
                        @else
                            <td>
                                <form action="{{route('ratings.create',array($location->id))}}" method="get">
                                    <button type="submit" class="btn-primary">New rating</button>
                                </form>
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection