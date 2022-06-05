@extends('layout.v_template')
@section('title', 'Analisis Pemilihan Konsentrasi Matakuliah')
@section('content')
    <table class="table table-bordered">
        <thead>
            <th>Atribut Diketahui</th>
            <th>Nilai Atribut</th>
            <th>Atribut Dicari Pilihan Konsentrasi</th>
            <th>Jumlah Dataset</th>
            <th>Jumlah Dataset Dicari</th>
            <th>Total Nilai</th>
        </thead>
        <tbody>
            @foreach ($dataset as $data)
                <tr>
                    <td>{{ $data[0] }}</td>
                    <td>{{ $data[1] }}</td>
                    <td>
                        <table>
                            /*
                            Variabel dicari di sini adalah data konsentrasi
                            */
                            @foreach ($dicaris as $dicari)
                                <tr>
                                    <td>{{ $dicari->kriteria }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <table>
                            @foreach ($data[2] as $dataset_dicari)
                                <tr>
                                    <td>{{ $dataset_dicari[0] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <table>
                            @foreach ($data[2] as $dataset_dicari)
                                <tr>
                                    <td>{{ $dataset_dicari[1] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <table>
                            @foreach ($data[2] as $dataset_dicari)
                                <tr>
                                    <td>{{ $dataset_dicari[2] }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <th>Nilai hasil analisis kosentrasi matakuliah</th>
            <th>Hasil Akhir</th>
        </thead>
        <tbody>
            @foreach ($dataset_jumlah as $dataset_jumlahnya)
                <tr>
                    <td>{{ $dataset_jumlahnya[0] }}</td>
                    <td>{{ $dataset_jumlahnya[1] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <th>Kesimpulan</th>
        </thead>
        <tbody>
            <tr>
                <td>Mahasiswa Dengan Nilai</td>
                <td>
                    <table class="table table-bordered">
                        @foreach ($dataset as $data)
                            <tr>
                                <td>{{ $data[0] }}</td>
                                <td>:</td>
                                <td>{{ $data[1] }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Direkomendasikan Untuk Memilih</td>
                        </tr>
                        @foreach ($dicarisx as $dicari)
                            <tr>
                                <td>{{ $dicari->nama }}</td>
                                <td>:</td>
                                <td>
                                    {{ $hasil[0] }}
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Dengan Nilai Terbesar</td>
                            <td> = </td>
                            <td>{{ $hasil[1] }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
