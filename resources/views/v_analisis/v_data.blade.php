@extends('layout.v_template')
@section('title', 'Analisis Pemilihan Konsentrasi Matakuliah')
@section('content')
    <form action="{{ route('analisis.hitung') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <table class="table table-bordered">
                            <tbody>
                                <!--
                                Variabel diketahui di sini adalah data matakuliah
                                -->
                                @foreach ($diketahuis as $diketahui)
                                    <tr>
                                        <td>{{ $diketahui->nama }}</td>
                                        <td>:</td>
                                        <td>
                                            <select name="id_kriteria[]" id="" required>
                                                <option value=""></option>
                                                @foreach ($kriterias as $kriteria)
                                                    @if ($diketahui->id == $kriteria->id_atribut)
                                                        <option value="{{ $kriteria->kriteria_id }}">
                                                            {{ $kriteria->kriteria }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                <!--
                                Variabel dicari di sini adalah data konsentrasi
                                -->
                                @foreach ($dicaris as $dicari)
                                    <tr>
                                        <td>Dicari</td>
                                        <td>:</td>
                                        <td>{{ $dicari->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Hitung</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection