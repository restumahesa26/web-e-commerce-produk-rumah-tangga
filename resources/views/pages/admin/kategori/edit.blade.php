@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Data Kategori</h1>
                    <a href="" class="btn btn-sm btn-primary shadow-sm mt-3">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Ubah Data Kategori
                    </a>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $item->id) }}" method="POST" class="form" id="form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input id="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" placeholder="Nama Kategori" value="{{ $item->nama_kategori }}">
                                @error('nama_kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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