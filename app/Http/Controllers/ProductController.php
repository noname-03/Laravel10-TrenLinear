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
            'price' => 'required',
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
        //get product with transaction and sum of quantity by year
        $product = Product::with([
            'transactions' => function ($query) {
                $query->selectRaw('product_id, year(date) as year, sum(total) as total_quantity')
                    ->groupBy('product_id', 'year');
            }
        ])->findOrFail($id);

        $data_json = $product->transactions;
        // dd($data_json);

        // Pastikan data transaksi tidak kosong
        if (!$data_json->isEmpty()) {
            // Konversi koleksi Eloquent menjadi array
            $transaction_array = $data_json->toArray();

            // Urutkan array berdasarkan tahun secara descending
            usort($transaction_array, function ($a, $b) {
                return $b['year'] - $a['year'];
            });

            // Ambil tahun terakhir
            $last_year = $transaction_array[0]['year'];

            // Tambahkan 1 ke tahun terakhir
            $next_year = $last_year + 1;

            // Cetak tahun terakhir dan tahun setelahnya
            // echo "Last Year: $last_year, Next Year: $next_year";
        } else {
            // Kasus jika tidak ada data transaksi
            $next_year = 0;
            // echo "No transaction data available." . $next_year;
        }



        // Konversi JSON menjadi array PHP
        $data = json_decode($data_json, true);

        if (count($data) > 2) {
            $tren_linear = $this->calculate_linear_trend($data);
        } else {
            $tren_linear = 0;
        }

        return view('pages.product.show', compact('product', 'tren_linear', 'next_year'));
    }

    function calculate_linear_trend($data)
    {
        $n = count($data);
        $sum_x = 0;
        $sum_y = 0;
        $sum_xy = 0;
        $sum_x_squared = 0;

        foreach ($data as $point) {
            $sum_x += $point['year'];
            $sum_y += $point['total_quantity'];
            $sum_xy += $point['year'] * $point['total_quantity'];
            $sum_x_squared += $point['year'] * $point['year'];
        }

        $m = ($n * $sum_xy - $sum_x * $sum_y) / ($n * $sum_x_squared - $sum_x * $sum_x);
        $b = ($sum_y - $m * $sum_x) / $n;

        return $m * (end($data)['year'] + 1) + $b;
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
            'price' => 'required',
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