<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rumit App</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- Rumit.js -->
        <link rel="stylesheet" href="{{asset('css/rumit.css')}}">

        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>

        <div class="container">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow"  id="mainNavbar">
                <a class="navbar-brand" href="#">RUMIT</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMainDropdown" aria-controls="navbarMainDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMainDropdown">
                    <ul class="navbar-nav mr-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('beranda.index')}}"><i class="fas fa-home"></i> Beranda</a>
                        </li>
                       
                        @if (auth()->user()->isAdmin())
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAdministratorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-cog"></i> Administrator</a>
                            <div class="dropdown-menu rounded" aria-labelledby="navbarAdministratorDropdown">
                                <a class="dropdown-item" href="{{route('administrator.userman.index')}}">Manajemen Pengguna</a>
                                <a class="dropdown-item" href="{{route('administrator.pengumuman')}}">Manajemen Pengumuman</a>
                                <a class="dropdown-item" href="{{route('administrator.ruangdiskusi')}}">Manajemen Ruang Diskusi</a>
                                <a class="dropdown-item" href="{{route('administrator.arsip')}}">Manajemen Arsip</a>
                                <a class="dropdown-item" href="{{route('administrator.penilaian')}}">Manajemen Penilaian</a>
                            </div>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pengumuman.index')}}"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('ruangdiskusi.index')}}"><i class="fa fa-comments"></i> Ruang Diskusi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('arsip.index')}}"><i class="fa fa-folder"></i> Arsip</a>
                        </li>

                        @if (auth()->user()->notFungsional())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('penilaian.index')}}"><i class="fas fa-briefcase"></i> Penilaian</a>
                        </li>
                        @endif
                    </ul>
                    
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <img src="{{asset(Auth()->user()->getAvatarname())}}" style="height:25px; width:25px" class="rounded-circle m-0 p-0" alt="Responsive image"> 
                                     Hi, {{auth()->user()->getUsername()}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form class="nav-link" id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                            </form>
                        </li>
                    </ul>
                    @endauth
                </div>
            </nav>
            <!--End Navigation-->

            <!-- Content -->
            <div class="d-flex flex-column">
                
                @yield('content')
               

                <!-- Footer-->
                <footer class="divborder divborder-default container" style="display:block">
                    <div class="navbar">
                        <ul class="navbar-nav">
                            <p>Copyright © 2018 Bidang IPDS <a href="#">BPS Provinsi NTB</a></p>
                        </ul>

                        <ul class="navbar-nav">
                            <p>Rumit v.0.0.1</p>
                        </ul>
                        
                    </div>
                </footer>
            </div>
            <!--End Content-->
        </div>
        <!--End Container-->
    </body>

    <!-- Script -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('js/rumit.js') !!}"></script>
    <script src="{!! asset('js/arsip.js') !!}"></script>
    <script src="{!! asset('js/ruangdiskusi.js') !!}"></script>
    <script src="{!! asset('js/pengumuman.js') !!}"></script>
    <script src="{!! asset('js/penilaian.js') !!}"></script>
    <script src="{!! asset('js/userman.js') !!}"></script>
    <script src="{!! asset('js/detaildiskusi.js') !!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
