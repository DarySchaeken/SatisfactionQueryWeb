@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Locations</h1>
        </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
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