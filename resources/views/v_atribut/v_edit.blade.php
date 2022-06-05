@extends('layout.v_template')
@section('title', 'Edit Data Atribut')

@section('content')
    <form action="{{ route('atribut.update', $atribut->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>ID Atribut</label>
                        <input name="id" class="form-control" value="{{ $atribut->id }}" readonly>
                        <div class="text-danger">
                            @error('id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nama Atribut</label>
                        <input name="nama" class="form-control" value="{{ $atribut->nama }}">
                        <div class="text-danger">
                            @error('nama')
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
