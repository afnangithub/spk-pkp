@extends('layout.v_template')
@section('title', 'Add Data Atribut')

@section('content')
    <form action="{{ route('atribut.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="content">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Nama Atribut</label>
                        <input name="nama" class="form-control" value="{{ old('nama') }}">
                        <div class="text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status Atribut</label>
                        <select name="status" class="form-control">
                            <option></option>
                            <option value="diketahui" @if (old('status') == 'diketahui') {{ 'selected' }} @endif>Mata Kuliah</option>
                            <option value="dicari" @if (old('status') == 'dicari') {{ 'selected' }} @endif>Konsentrasi</option>
                        </select>
                        <div class="text-danger">
                            @error('status')
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
