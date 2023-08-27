<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1028'
        ]);

        //upload photo
        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('file/'), $imageName);
        $request['photo'] = $imageName;
        Product::create($request->except('file'));

        return redirect()->route('product.index')->with('success', 'Produk Berhasil Di Tambahkan.!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1028'
            ]);
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('file/'), $imageName);
            $request['photo'] = $imageName;
            File::delete('file/' . $product->photo);
        } else {
            $request['photo'] = $product->photo;
        }

        $product->update($request->except('file'));

        return redirect()->route('product.index')->with('success', 'Produk Berhasil Di Perbarui.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        File::delete('file/' . $product->photo);
        $product->delete();
        return response()->json(['message' => 'Produk Berhasil Di Hapus.!']);
    }
}