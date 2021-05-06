@extends('layouts.admin')

@section('title')
	<title>Data Admin</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 mt-3 text-black">Data Admin</h1>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row mx-2 mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0" id="table_id">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Role</th>
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
                                    <td>{{ $item->name }}</td>   
                                    <td>{{ $item->roles }}</td>                                     
                                    <td>
                                        @if ($item->roles == 'ADMIN')
                                            <a href="{{ route('set-user', $item->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">Set User</a>
                                        @elseif ($item->roles == 'USER')
                                            <a href="{{ route('set-admin', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                            title="Edit Data">Set Admin</a>
                                        @endif
                                        <form action="{{ route('delete-admin', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
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