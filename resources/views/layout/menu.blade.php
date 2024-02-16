<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config = DB::table('konfigurasi')->first();
// Nav profil
$myprofil = new Nav_model();
$nav_profil = $myprofil->nav_profil();
$nav_layanan = $myprofil->nav_layanan();
$nav_berita = $myprofil->nav_berita();
$nav_terjadi = $myprofil->nav_terjadi();
$nav_materi = $myprofil->nav_materi();
?>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i
                    class="fas fa-bars justify-content-start align-item-start"></i> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a> </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('profil') }}">Profil</a> </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('berita') }}">Berita</a> </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> Bidang <span class="pull-right"><i
                                    class="fas fa-caret-down"></i></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach($nav_layanan as $nav_layanan) { ?>
                            <li><a href="{{ asset('berita/layanan/' . $nav_layanan->slug_berita) }}"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    {{ Str::words($nav_layanan->judul_berita, 6) }}</a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> Download <span class="pull-right"><i
                                    class="fas fa-caret-down"></i></span></a>
                        <ul class="dropdown-menu">
                            <?php foreach($nav_materi as $nav_materi) { ?>
                            <li><a href="{{ asset('download/kategori/' . $nav_materi->slug_kategori_download) }}"><i
                                        class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    {{ Str::words($nav_materi->nama_kategori_download, 6) }}</a></li>
                            <?php } ?>
                            <li><a href="{{ asset('download') }}"><i class="fa fa-angle-double-right"
                                        aria-hidden="true"></i> Lihat Semua Data</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ asset('video') }}">Video</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ asset('galeri') }}">Galeri</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ asset('kontak') }}">Kontak</a> </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>
</div>
</header>
<!--Header End-->
