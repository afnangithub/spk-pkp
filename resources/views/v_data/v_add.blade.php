@extends('layout.v_template')
@section('title', 'Add Data')

@section('content')
    <form action="{{ route('data.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Keterangan</label>
                        <input name="keterangan" class="form-control" value="{{ old('keterangan') }}">
                        <div class="text-danger">
                            @error('keterangan')
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
