@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Total Pengguna') }}</div>

                <div class="card-body">
                    {{ $jumlahPengguna }}
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Total Genre') }}</div>

                <div class="card-body">
                    1
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Total Film') }}</div>

                <div class="card-body">
                    1
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
