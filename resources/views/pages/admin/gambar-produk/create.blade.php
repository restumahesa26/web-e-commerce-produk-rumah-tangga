@extends('layouts.admin')

@section('title')
	<title>Data Gambar Produk - Tambah</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Data Gambar Produk</h1>
                    <a href="" class="btn btn-sm btn-primary shadow-sm mt-3">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Gambar Produk
                    </a>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        @if (Session::has('error-create'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> Gambar untuk produk ini sudah dimasukkan.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('gambar-produk.store') }}" method="POST" class="form" id="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="produk_id">Nama Produk</label>
                                <select name="produk_id" id="produk_id" class="form-control">
                                    @foreach ($produk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img_url">Masukkan Gambar</label>
                                <input type="file" name="img_url" id="img_url" class="form-control">
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