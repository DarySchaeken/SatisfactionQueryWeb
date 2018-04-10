@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>
                            You are logged in!
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
