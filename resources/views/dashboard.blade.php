<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List</h1>
                        <a href="{{ route('admin/products/create') }}" class="btn btn-primary">Add</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Kamar</th>
                                <th>Nama Lengkap</th>
                                <th>Telp</th>
                                <th>Umur</th>
                                <th>Alamat</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                            <td class="align-middle">{{ $product->kamar }}</td>
                            <td class="align-middle">{{ $product->nama_lengkap }}</td>
                            <td class="align-middle">{{ $product->telp }}</td>
                            <td class="align-middle">{{ $product->umur }}</td>
                            <td class="align-middle">{{ $product->alamat }}</td>
                            <td class="align-middle">{{ $product->total }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>