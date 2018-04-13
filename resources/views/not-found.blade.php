@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        Dashboard
                    </div>

                    <div class="card-body">
                        <p>
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ session('not-found') }} not found!
                        </p>
                        <a href="{{ url('/locations') }}" class="btn btn-primary" role="button">
                            Go to locations page
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection