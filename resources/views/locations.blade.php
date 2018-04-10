@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        Locations
                    </div>

                    <div class="card-body">
                        @if (session('token'))
                            <div class="row">
                                <p>Your token is {{ session('token') }}</p>
                            </div>
                        @endif

                        <div>
                            @auth
                                <form action="{{route ('locations.create')}}" method="get">
                                    <button type="submit" class="btn btn-primary">Add Location</button>
                                </form>
                                </br>
                            @endauth
                        </div>

                        @guest
                            <div class="row">
                                <h3>Edit previous rating?</h3>
                            </div>
                            <div class="row">
                                <form action="{{route ('ratings.edit') }}" method="get">
                                    <input type="text" name="token" placeholder="token"/>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div>
                            </br>
                        @endguest

                        <div class="row">
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                @foreach($locations as $location)
                                    <tr>
                                        <td>{{$location->id}}</td>
                                        <td>{{$location->name}}</td>
                                        @auth
                                            <td>
                                                <form action="{{route ('locations.edit',[$location->id])}}"
                                                      method="get">
                                                    {!! csrf_field() !!}
                                                    <button type="submit" class="btn btn-primary">Modify</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route ('locations.destroy',[$location->id])}}"
                                                      method="post">
                                                    {!! csrf_field() !!}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                </form>
                                            </td>
                                        @else
                                            <td>
                                                <form action="{{route('ratings.create',array($location->id))}}"
                                                      method="get">
                                                    <button type="submit" class="btn btn-primary">New rating</button>
                                                </form>
                                            </td>
                                            <td></td>
                                        @endauth
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection