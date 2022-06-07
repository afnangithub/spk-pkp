@extends('layout.v_template')
@section('title', 'Beranda')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ asset('logo') }}/logo.jpg" alt="User Image" width="100px">
            </div>
            <div class="col-sm-12">
                <h1>SISTEM PENDUKUNG KEPUTUSAN</h1>
                <h4>PEMILIHAN KONSENTRASI PEMINATAN</h4>
                <h5>MENGGUNAKAN METODE NAÏVE BAYES</h5>
            </div>
        </div>
        <div class="row p-3 mb-2 bg-warning text-dark">
            <div class="col-sm-12">
                <h2>Tentang</h2>
                <h5>Sistem Informasi ini khusus ditunjukan untuk Ketua Program Studi di lingkungan Program Studi Teknik
                    Informatika Universitas Nurtanio Bandung. Sistem Informasi ini dapat digunakan Ketua Program Studi untuk
                    membantu merekomendasikan pilihan konsentrasi peminatan kepada Mahasiswa berdasarkan nilai matakuliah
                    terkait. Sistem Informasi ini juga dapat digunakan mahasiswa langsung tanpa login tapi dengan hanya
                    memasuan
                    nilai matakuliah terkait seusai dengan yang didapatkan mahasiswa.
                </h5>
                <h2>Manfaat SPK Ini</h2>
                <h5>1. Dengan adanya sistem pendukung keputusan ini dapat menjadi rancangan untuk pemilihan dan
                    rekomendasi peminatan konsentrasi di program studi teknik informatika Universitas Nurtanio Bandung
                    <br>
                    2. Dengan adanya sistem pendukung keputusan ini, ketua program studi dapat memberikan rekomendasi dalam
                    pilihan konsentrasi peminatan untuk mahasiswa.

                </h5>
            </div>
        </div>
        
    </div>

@endsection
