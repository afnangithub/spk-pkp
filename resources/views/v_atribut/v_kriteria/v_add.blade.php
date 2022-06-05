@extends('layout.v_template')
@section('title', 'Add Data Kriteria')

@section('content')
    <form action="{{ route('kriteria.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>ID Atribut</label>
                        <input name="id" class="form-control" value="{{ $id}}" readonly>
                        <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kriteria</label>
                        <input name="kriteria" class="form-control" value="{{ old('kriteria') }}">
                        <div class="text-danger">
                            @error('kriteria')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
