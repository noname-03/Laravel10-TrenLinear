<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::count();
        $transaction = Transaction::count();

        // Mendapatkan data transaksi selama satu tahun
        $startDate = now()->subYear(); // Tanggal mulai satu tahun yang lalu
        $endDate = now(); // Tanggal saat ini
        $topThreeProducts = DB::table('transactions')
            ->select('product_id', DB::raw('SUM(total) as total_sales'))
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy('product_id')
            ->orderByDesc('total_sales')
            ->take(3)
            ->pluck('product_id');

        // Inisialisasi data bulanan untuk tiga produk terlaris
        $monthlyData = [];

        // Loop melalui tiga produk terlaris
        foreach ($topThreeProducts as $productId) {
            $product = Product::find($productId);

            $productData = [
                'product_id' => $product->name,
                'total_qty' => [],
                'total_amount' => [],
            ];

            // Loop melalui 12 bulan
            for ($month = 1; $month <= 12; $month++) {
                $monthlySummary = DB::table('transactions')
                    ->select(DB::raw('SUM(qty) as total_qty, SUM(total) as total_amount'))
                    ->where('product_id', $productId)
                    ->whereYear('date', now()->year)
                    ->whereMonth('date', $month)
                    ->first();

                $productData['total_qty'][] = $monthlySummary->total_qty ?? 0;
                $productData['total_amount'][] = $monthlySummary->total_amount ?? 0;
            }

            $monthlyData[] = $productData;
        }

        return view('home', compact('products', 'transaction', 'monthlyData'));
    }
}