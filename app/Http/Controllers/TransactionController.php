<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('pages.transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.transaction.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'date' => 'required',
            'qty' => 'required',
        ]);

        $request['total'] = $request->qty * Product::find($request->product_id)->price;
        Transaction::create($request->all());

        return redirect()->route('transaction.index')->with('success', 'Transaksi Berhasil Di Tambahkan.!');
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
        $transaction = Transaction::find($id);
        $products = Product::all();
        return view('pages.transaction.edit', compact('transaction', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'date' => 'required',
            'qty' => 'required',
        ]);
        $request['total'] = $request->qty * Product::find($request->product_id)->price;
        // dd($request->all());

        Transaction::find($id)->update($request->all());

        return redirect()->route('transaction.index')->with('success', 'Transaksi Berhasil Di Perbarui.!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Transaction::find($id)->delete();
        return response()->json(['message' => 'Produk Berhasil Di Hapus.!']);
    }
}