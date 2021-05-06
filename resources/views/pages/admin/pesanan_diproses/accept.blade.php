@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Bukti Pembayaran</h1>
                </div>
                <div class="card-show">
                    <div class="card-body">
                        <form action="{{ route('proses-bukti-bayar', $item->id) }}" method="POST" class="form" id="form">
                            @csrf
                            <div class="form-group">
                                <label for="rekening_pembayaran">Rekening Pembayaran</label>
                                <input id="rekening_pembayaran" type="text" class="form-control" placeholder="" value="{{ $item->rekening_pembayaran }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="rekening_user">Rekening Pemesan</label>
                                <input id="rekening_user" type="text" class="form-control" placeholder="" value="{{ $item->rekening_user }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="bukti_bayar">Bukti Pembayaran</label>
                                <img src="{{ asset('storage/images/bukti-bayar/'. $item->bukti_bayar) }}" alt="" style="width: 400px">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block create-confirm">
                                Setujui Pembayaran
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