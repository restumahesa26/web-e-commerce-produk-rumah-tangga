@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h1 class="h3 mb-0 mt-3 text-black">Data Produk</h1>
                        <a href="{{ route('produk.create') }}" class="btn btn-sm btn-primary shadow-sm mt-3">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data Produk
                        </a>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row mx-2 mt-3">
                        @if (Session::has('success-create'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil menambah data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success-update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil mengubah data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (Session::has('success-delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> Berhasil menghapus data produk.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" id="table_id">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
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
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->nama }}</td>   
                                        <td>{{ $item->kategori->nama_kategori }}</td>      
                                        <td>{{ $item->stok }}</td>      
                                        <td>{{ $item->harga }}</td>                                           
                                        <td>
                                            <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                                title="Edit Data">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger delete-confirm" data-toggle="tooltip" data-placement="bottom"
                                                    title="Hapus Data">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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