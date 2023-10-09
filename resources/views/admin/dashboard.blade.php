@extends('layouts.app')

@section('content')
<div class="container" style="height: 100vh">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card text-white bg-transparent" style="border-color:#f53619 ">
                <div class="card-header text-dark">{{ __('User Dashboard') }}</div>

                <div class="card-body text-dark">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection