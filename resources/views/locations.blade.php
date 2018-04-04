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
                        <td>0</td>
                        <td><a href="{{url ('/locations/create')}}">Add location</a></td>
                    </tr>
                @endauth
                @foreach($locations as $location)
                    <tr>
                        <td>{{$location->id}}</td>
                        <td>{{$location->name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection