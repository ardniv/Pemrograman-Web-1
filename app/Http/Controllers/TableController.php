<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class TableController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(10);
        return view('admins.table.index', compact('products'));
    }

    public function create(){
        return view('admins.table.create');
    }

    public function store(Request $request){
        $validation = $request->validate([
            'kamar' => 'required|integer',
            'nama_lengkap' => 'required|string',
            'telp' => 'required|digits_between:10,12|numeric',
            'umur' => 'required|integer',
            'alamat' => 'required|string',
            'total' => 'required|integer',
        ],[
            'kamar.required' => 'Field kamar harus diisi.',
            'kamar.integer' => 'Field kamar harus berupa angka.',
            'nama_lengkap.required' => 'Field nama lengkap harus diisi.',
            'nama_lengkap.string' => 'Field nama lengkap harus berupa string.',
            'telp.required' => 'Field telp harus diisi.',
            'telp.digits_between' => 'Field telp harus berjumlah antara 10 hingga 12 angka.',
            'telp.numeric' => 'Field telp harus berupa angka.',
            'umur.required' => 'Field umur harus diisi.',
            'umur.integer' => 'Field umur harus berupa angka.',
            'alamat.required' => 'Field alamat harus diisi.',
            'alamat.string' => 'Field alamat harus berupa string.',
            'total.required' => 'Field total harus diisi.',
            'total.integer' => 'Field total harus berupa angka.',
        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Data Add Successfully');
            return redirect(route('admins.table.index'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admins.table.index'));
        }
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('admins.table.update', compact('products'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'kamar' => 'required|integer',
        'nama_lengkap' => 'required|string',
        'telp' => 'required|digits_between:10,12|numeric',
        'umur' => 'required|integer',
        'alamat' => 'required|string',
        'total' => 'required|integer',
    ], [
        'kamar.required' => 'Field kamar harus diisi.',
        'kamar.integer' => 'Field kamar harus berupa angka.',
        'nama_lengkap.required' => 'Field nama lengkap harus diisi.',
        'nama_lengkap.string' => 'Field nama lengkap harus berupa string.',
        'telp.required' => 'Field telp harus diisi.',
        'telp.digits_between' => 'Field telp harus berjumlah antara 10 hingga 12 angka.',
        'telp.numeric' => 'Field telp harus berupa angka.',
        'umur.required' => 'Field umur harus diisi.',
        'umur.integer' => 'Field umur harus berupa angka.',
        'alamat.required' => 'Field alamat harus diisi.',
        'alamat.string' => 'Field alamat harus berupa string.',
        'total.required' => 'Field total harus diisi.',
        'total.integer' => 'Field total harus berupa angka.',
    ]);

    $products = Product::findOrFail($id);

    $products->update([
        'kamar' => $request->kamar,
        'nama_lengkap' => $request->nama_lengkap,
        'telp' => $request->telp,
        'umur' => $request->umur,
        'alamat' => $request->alamat,
        'total' => $request->total,
    ]);

    if ($products) {
        session()->flash('success', 'Data Update Successfully');
        return redirect(route('admins.table.index'));
    } else {
        session()->flash('error', 'Some problem occurred');
        return redirect()->back();
    }
}

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admins.table.index')->with('success', 'Data deleted successfully');
    }
}
