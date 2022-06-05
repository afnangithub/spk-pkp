@extends('layout.v_template')
@section('title', 'Data')

@section('content')
    <a href="{{ route('data.add') }}" class="btn btn-primary btn-sm">Add</a>
    <br>
    <br>

    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <br>
    <form action="{{ route('data.search') }}" method="GET">
        <input type="text" name="search">
        <input type="submit" value="Cari">
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Data</th>
                <th>Keterangan</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + ($datas->currentPage() - 1) * 5; ?>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <a href="{{ route('data.detail', $data->id) }}"
                            class="btn btn-sm btn-success">Detail</a>
                        <a href="{{ route('data.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $data->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $datas->links() }}
    @foreach ($datas as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ $data->keterangan }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini..????</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <a href="{{ route('data.delete', $data->id) }}" class="btn btn-outline">Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
