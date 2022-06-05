@extends('layout.v_template')
@section('title', 'Data Kriteria')

@section('content')


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kriteria</th>
                <th>Nama Atribut</th>
                <th>Kriteria</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 + ($kriteria->currentPage() - 1) * 5; ?>
            @foreach ($kriteria as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->kriteria_id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kriteria }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $kriteria->links() }}
@endsection
