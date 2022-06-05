<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu</li>
    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="fa fa-home"></i>
            <span>Beranda</span></a></li>
    <li class="{{ request()->is('analisis') ? 'active' : '' }}"><a href="{{ route('analisis') }}"><i
                class="fa fa-book"></i> <span>Analisis</span></a></li>
    @if (Route::has('login'))
        @auth
            <a href=""></a>
            <li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{ route('home') }}"><i
                        class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="{{ request()->is('atribut') ? 'active' : '' }}"><a href="{{ route('atribut') }}"><i
                        class="fa fa-book"></i> <span>Data Atribut</span></a></li>
            <li class="{{ request()->is('kriteria') ? 'active' : '' }}"><a href="{{ route('kriteria') }}"><i
                        class="fa fa-book"></i> <span>Data Kriteria</span></a></li>
            <li class="{{ request()->is('data') ? 'active' : '' }}"><a href="{{ route('data') }}"><i
                        class="fa fa-book"></i> <span>Data</span></a></li>
            <li class="{{ request()->is('dataset') ? 'active' : '' }}"><a href="{{ route('dataset') }}"><i
                        class="fa fa-book"></i> <span>Dataset</span></a></li>
        @else
            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ route('login') }}"><i
                        class="fa fa-book"></i> <span>Log in</span></a></li>
            <!--
                    @if (Route::has('register'))
                        <li class="{{ request()->is('register') ? 'active' : '' }}"><a href="{{ route('register') }}"><i
                                    class="fa fa-book"></i> <span>Register</span></a></li>
                    @endif
                                -->

        @endauth
    @endif
</ul>
