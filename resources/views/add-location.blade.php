@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        New location
                    </div>

                    <div class="card-body">
                        @guest
                            <div class="row">Login to add a location please!</div>
                        @else
                            <div class="row">
                                <form method="post" action="/locations">
                                    {{ csrf_field() }}
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="name"/>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection