@extends('layout.app')

@section('title','Edit')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="p-4 text-gray-900">
                <form action="{{ route('admins.user.update', $users->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col text-right">
                            <a href="{{ route('admins.user.index') }}" class="btn btn-primary">Go Back</a>
                        </div>
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" value="{{$users->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{$users->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <input type="text" name="usertype" class="form-control" placeholder="User Type" value="{{$users->usertype}}">
                        @error('usertype')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection