@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Masukkan Total Bayar</h1>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="{{ route('simpan-total-bayar', $item->id) }}" method="POST" class="form" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="provinsi">Provinsi Tujuan</label>
                                <input id="provinsi" type="text" class="form-control" placeholder="" value="{{ $item->provinsi }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kota">Kota / Kabupaten Tujuan</label>
                                <input id="kota" type="text" class="form-control" placeholder="" value="{{ $item->kota }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan Tujuan</label>
                                <input id="kecamatan" type="text" class="form-control" placeholder="" value="{{ $item->kecamatan }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <input id="alamat" type="text" class="form-control" placeholder="" value="{{ $item->alamat_lengkap }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bayar">Total Pesanan</label>
                                <input id="bayar" type="text" class="form-control" placeholder="" value="{{ $item->total }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="total_bayar">Masukkan Total Bayar Sekaligus Ongkir</label>
                                <input id="total_bayar" type="text" class="form-control @error('total_bayar') is-invalid @enderror" name="total_bayar" placeholder="{{ $item->total }}" value="">
                                @error('total_bayar')
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