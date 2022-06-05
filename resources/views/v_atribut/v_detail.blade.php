@extends('layout.v_template')
@section('title', 'Detail Data Atribut')

@section('content')

    <table class="table">
        <tr>
            <th width="100px">Nama Atribut</th>
            <th width="30px">:</th>
            <th>{{ $atribut->nama }}</th>
        </tr>
        <tr>
            <th width="100px">Status Atribut</th>
            <th width="30px">:</th>
            <th>{{ $atribut->status }}</th>
        </tr>
        <th>
            <a href="{{ route('atribut') }}" class="btn btn-success tbn-sm">Kembali</a>
        </th>
    </table>
    <h3>Data Kriteria Atribut : {{ $atribut->nama }}</h3>
    <a href="{{ route('kriteria.add', $atribut->id) }}" class="btn btn-primary btn-sm">Add</a>
    <br>
    <br>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Ktireria</th>
                <th>Kriteria</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + ($kriteria->currentPage() - 1) * 5; ?>
            @foreach ($kriteria as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kriteria_id }}</td>
                    <td>{{ $data->kriteria }}</td>
                    <td>
                        <a href="{{ route('kriteria.edit', $data->kriteria_id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $data->kriteria_id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kriteria->links() }}
    @foreach ($kriteria as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->kriteria_id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ $data->kriteria }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini..????</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <a href="{{ route('kriteria.delete', $data->kriteria_id) }}" class="btn btn-outline">Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach

@endsection
