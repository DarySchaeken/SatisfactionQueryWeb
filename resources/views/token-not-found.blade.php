@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <p>Token not found!</p><br/>
                        <a href="{{ url('/locations') }}">Go to locations page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection