@extends('layout.v_template')
@section('title', 'Home')

@section('content')

    <section class="content">

        <div class="row">

            <a href="{{ route('atribut') }}">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Atribut</span>
                            <span class="info-box-number">{{ $c_atribut }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </a>

            <a href="{{ route('kriteria') }}">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Kriteria</span>
                            <span class="info-box-number">{{ $c_kriteria }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </a>

            <a href="{{ route('data') }}">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Data</span>
                            <span class="info-box-number">{{ $c_data }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </a>

            <a href="{{ route('dataset') }}">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Dataset</span>
                            <span class="info-box-number">{{ $c_dataset }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </a>

        </div>
        <!-- /.row -->

        @if (Route::has('login'))
            @auth
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <button type="submit" class="btn btn-block btn-danger">Log out</button>
                </form>
            @endauth
        @endif
    </section>

@endsection
