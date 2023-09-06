@extends('layouts.app')
@section('title', 'Perbarui Data Produk')
@section('data.product', 'menu-open')
@section('product', 'active')
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulir Data Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Produk</a></li>
                        <li class="breadcrumb-item active">Perbarui Data Produk</li>
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
                        <h3 class="card-title">Perbarui Data Produk</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('product.update', $product->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Nama Produk</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" placeholder="Masukan Nama Produk" name="name"
                                                value="{{ old('name', $product->name) }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Harga</label>
                                            <input type="number" class="form-control  @error('price') is-invalid @enderror"
                                                id="price" placeholder="Masukan Harga product" name="price"
                                                value="{{ old('price', $product->price) }}">
                                            @error('price')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="file">Photo</label>
                                            <input type="file" class="form-control  @error('file') is-invalid @enderror"
                                                id="file" placeholder="Masukan Harga product" name="file"
                                                value="{{ old('file') }}" accept="image/*">
                                            @error('file')
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
