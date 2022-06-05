@extends('layout.v_template')
@section('title', 'Edit Data Atribut')

@section('content')
    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>ID Kriteria</label>
                        <input name="id" class="form-control" value="{{ $kriteria->id }}" readonly>
                        <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kriteria</label>
                        <input name="kriteria" class="form-control" value="{{ $kriteria->kriteria }}">
                        <div class="text-danger">
                            @error('kriteria')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="col sm-12">
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
