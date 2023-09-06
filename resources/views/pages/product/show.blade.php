@extends('layouts.app')
@section('title', 'Data Produk')
@section('data.product', 'menu-open')
@section('product', 'active')
@push('css')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Produk</a></li>
                        <li class="breadcrumb-item active">Trend Linear</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <a href="{{ route('product.create') }}" type="button" class="btn btn-primary btn-sm"><i
                                        class="fas fa-plus"></i> Tambah
                                    Data</a>
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table style="width: 100%">
                                    <tr>
                                        <td style="vertical-align:top">
                                            <label for="name">Nama :</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <p>{{ $product->name }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top; width:30%">
                                            <label for="price">Harga :</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <p>@currency($product->price)</p>
                                                {{-- <input type="text" id="user" class="form-control"> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:top">
                                            <label for="photo">Photo :</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <img src="{{ asset('file/' . $product->photo) }}" alt="tidak ada foto"
                                                    width="150px">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Trend Linear</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 1%">No</th>
                                            <th>Tahun</th>
                                            <th>Total</th>
                                            {{-- <th style="width: 5%">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->transactions as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->year }}</td>
                                                <td>@currency($item->total_quantity)</td>
                                                {{-- <td>@currency($item->price)</td> --}}
                                                {{-- <td>
                                                    <img src="{{ asset('file/' . $item->photo) }}" alt="Photo"
                                                        class="img-thumbnail" width="50px">
                                                </td> --}}
                                                {{-- <td style="text-align: center;">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('product.show', $item->id) }}"
                                                            class="btn btn-sm btn-outline-info">
                                                            <i class="fas fa-calculator"></i>
                                                        </a>
                                                        <a href="{{ route('product.edit', $item->id) }}"
                                                            class="btn btn-sm btn-outline-secondary">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit"
                                                            onclick="confirmDelete('{{ route('product.destroy', $item->id) }}')"
                                                            class="btn btn-sm btn-outline-danger delete-button">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>

                                                </td> --}}
                                            </tr>
                                        @endforeach
                                        @if (count($product->transactions) > 0)
                                            <tr>
                                                <td colspan="2">Maka Untuk Tahun {{ $next_year }} Adalah </td>
                                                <td>@currency($tren_linear)</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
