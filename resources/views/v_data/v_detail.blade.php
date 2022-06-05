@extends('layout.v_template')
@section('title', 'Detail Data')

@section('content')

    <table class="table">
        <tr>
            <th width="100px">ID Data</th>
            <th width="30px">:</th>
            <th>{{ $datas->id }}</th>
        </tr>
        <tr>
            <th width="100px">Keterangan</th>
            <th width="30px">:</th>
            <th>{{ $datas->keterangan }}</th>
        </tr>
        <th>
            <a href="{{ route('data') }}" class="btn btn-success tbn-sm">Kembali</a>
        </th>
    </table>
    <h3>Dataset Data : {{ $datas->keterangan }}</h3>
    <br>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <form action="{{ route('dataset.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ID Data</label>
                        <input name="id" class="form-control" value="{{ $datas->id }}" readonly>
                        <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Atribut</th>
                                    <th>Kriteria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($atributs as $atribut)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $atribut->nama }}</td>
                                        <td>
                                            <select name="id_kriteria[]" id="" required>
                                                <option value=""></option>
                                                @foreach ($kriterias as $kriteria)
                                                    @if ($atribut->id == $kriteria->id_atribut)
                                                        <option value="{{ $kriteria->kriteria_id }}" 
                                                            @foreach ($dataset as $data) 
                                                                @if ($data->id_kriteria==$kriteria->kriteria_id)
                                                                    {{ 'selected' }} 
                                                                @endif
                                                            @endforeach
                                                        >
                                                            {{ $kriteria->kriteria }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Dataset</th>
                <th>Nama Atribut</th>
                <th>Kriteria</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($dataset as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->dataset_id }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kriteria }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
