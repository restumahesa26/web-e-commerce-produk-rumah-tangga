@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Data Produk</h1>
                    <a href="" class="btn btn-sm btn-primary shadow-sm mt-3">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Produk
                    </a>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="POST" class="form" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama Produk" value="{{ old('nama') }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" id="kategori_id" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan Produk</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok Produk</label>
                                <input id="stok" type="number" min="0" class="form-control @error('stok') is-invalid @enderror" name="stok" placeholder="Stok Produk" value="{{ old('stok') }}">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input id="harga" type="number" min="0" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Harga Produk" value="{{ old('harga') }}">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat Produk</label>
                                <input id="berat" type="number" min="0" class="form-control @error('berat') is-invalid @enderror" name="berat" placeholder="Berat Produk" value="{{ old('berat') }}">
                                @error('berat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status Produk</option>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="habis">Habis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="best_seller">Best Seller</label>
                                <select name="best_seller" id="best_seller" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block create-confirm">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->                   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection