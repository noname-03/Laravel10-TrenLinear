@extends('layouts.app')
@section('title', 'Perbarui Data Transaksi')
@section('data.product', 'menu-open')
@section('transaction', 'active')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Perbarui Data Transaksi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Perbarui Data Transaksi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('transaction.update', $transaction->id) }}" method="post">
                                    @csrf @method('put')
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="product_id">Produk</label>
                                            <select class="form-control selectpicker" name="product_id"
                                                data-live-search="true" @error('product_id') is-invalid @enderror>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $transaction->product_id == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="date">Tanggal</label>
                                            <input type="date" class="form-control  @error('date') is-invalid @enderror"
                                                id="date" placeholder="Masukan Nama Item" name="date"
                                                value="{{ old('date', $transaction->date) }}">
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="qty">Jumlah</label>
                                            <input type="number" class="form-control  @error('qty') is-invalid @enderror"
                                                id="qty" placeholder="Masukan Jumlah Barang" name="qty"
                                                value="{{ old('qty', $transaction->qty) }}">
                                            @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('script')
    <script src="{{ asset('admin/bs/dist/js/bootstrap-select.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/bs/dist/css/bootstrap-select.css') }}">
@endpush
