@extends('layout.v_template')
@section('title', 'Edit Data')

@section('content')
    <form action="{{ route('data.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label>Keterangan</label>
                        <input name="keterangan" class="form-control" value="{{ $datas->keterangan }}">
                        <div class="text-danger">
                            @error('keterangan')
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
