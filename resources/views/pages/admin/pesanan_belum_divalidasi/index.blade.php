@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Pesanan Belum Divalidasi</h1>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row mx-2 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="table_id">
                            <thead>
                                <tr class="text-center">
                                    <th>Kode Pesanan</th>
                                    <th>Nama Pemesan</th>
                                    <th>Total Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"> 
                                @php
                                    $no = 0;
                                @endphp           
                                @forelse ($items as $item)
                                @php
                                    $no++;
                                @endphp
                                <tr class="text-center">
                                    <td>{{ $item->kode_transaksi }}</td>
                                    <td>{{ $item->user->name }}</td>   
                                    <td>{{ $item->total }}</td>                         
                                    <td>
                                        <a href="{{ route('tambah-total-bayar', $item->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('show-pesanan', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Kosong
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->                   
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('addon-script')
    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
    </script>
@endpush