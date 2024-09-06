<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="p-4 text-gray-900">
                <form action="{{ route('admin/products/update', $products->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col text-right">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Go Back</a>
                        </div>
                        <label class="form-label">Kamar</label>
                        <input type="text" name="kamar" class="form-control" placeholder="Kamar" value="{{$products->kamar}}">
                        @error('kamar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{$products->nama_lengkap}}">
                        @error('nama_lengkap')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telp</label>
                        <input type="text" name="telp" class="form-control" placeholder="Telp" value="{{$products->telp}}">
                        @error('telp')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur</label>
                        <input type="text" name="umur" class="form-control" placeholder="Umur" value="{{$products->umur}}">
                        @error('umur')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{$products->alamat}}">
                        @error('alamat')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" name="total" class="form-control" placeholder="Total" value="{{$products->total}}">
                        @error('total')
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
</x-app-layout>