<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add') }}
        </h2>
    </x-slot>
 
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
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Go Back</a>
                </div>
                </div>
                <form action="{{ route('admin/products/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="kamar" class="form-control" placeholder="Kamar">
                            @error('kamar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                            @error('nama_lengkap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="telp" class="form-control" placeholder="Telp">
                            @error('telp')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="umur" class="form-control" placeholder="Umur">
                            @error('umur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="number" name="total" class="form-control" placeholder="Total">
                            @error('total')
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

</x-app-layout>