<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $products = Product::all();
        $total = Product::count();
        return view('dashboard', compact(['products', 'total']));
    }

    public function index_user()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $products = Product::all();
        $total = Product::count();
        return view('user.list', compact(['products', 'total']));
    }
 
    public function create()
    {
        return view('admin.product.create');
    }
 
    public function save(Request $request){
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
        return view('admin.product.update', compact('products'));
    }
 
    //public function delete($id)
    //{
    //    $products = Product::findOrFail($id)->delete();
    //    if ($products) {
    //        session()->flash('success', 'Product Deleted Successfully');
    //        return redirect(route('admin/products/'));
    //    } else {
    //        session()->flash('error', 'Product Not Delete successfully');
    //        return redirect(route('admin/products/'));
    //    }
    //}
 
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $kamar = $request->kamar;
        $nama_lengkap = $request->nama_lengkap;
        $telp = $request->telp;
        $umur = $request->umur;
        $alamat = $request->alamat;
        $total = $request->total;
 
        $products->kamar = $kamar;
        $products->nama_lengkap = $nama_lengkap;
        $products->telp = $telp;
        $products->umur = $umur;
        $products->alamat = $alamat;
        $products->total = $total;
        $data = $products->save();
        if ($data) {
            session()->flash('success', 'Data Update Successfully');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/products/update'));
        }
    }
}
