@extends('layout.app')

@section('title','Dashboard')

@section('content')
<!-- Content Row -->
<div class="row">
<div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Statistics</h4>
                    </div>
                    <div class="card-body">
                        <p>Total Registered Users: {{ $users }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
<div class="container mt-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Statistics</h4>
                    </div>
                    <div class="card-body">
                        <p>Total Registered Data: {{ $products }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection