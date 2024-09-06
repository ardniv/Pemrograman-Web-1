@extends('layout.app')

@section('title','Add')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="col text-right">
                    <a href="{{ route('admins.user.index') }}" class="btn btn-primary">Go Back</a>
                </div>
                </div>
                <form action="{{ route('admins.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Nama">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="usertype" class="form-control" placeholder="User Type">
                            @error('usertype')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection