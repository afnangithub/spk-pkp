@extends('layout.v_template')
@section('title', 'Dataset')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Dataset</th>
                <th>ID Data</th>
                <th>Nama Atribut</th>
                <th>Nama Nilai Atribut</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + ($dataset->currentPage() - 1) * 5; ?>
            @foreach ($dataset as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->dataset_id }}</td>
                    <td>{{ $data->id_data }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kriteria }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $dataset->links() }}
    @foreach ($dataset as $data)
        <div class="modal modal-danger fade" id="delete{{ $data->dataset_id }}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ $data->nama }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda Yakin Ingin Menghapus Data Ini..????</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <a href="{{ route('atribut.delete', $data->dataset_id) }}" class="btn btn-outline">Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
