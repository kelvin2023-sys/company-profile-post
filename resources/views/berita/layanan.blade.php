<?php
$bg = DB::table('heading')->where('halaman', 'Layanan')->orderBy('id_heading', 'DESC')->first();
?>
<!--Inner Header Start-->
<section class="wf100 p82 inner-header"
    style="background-image: url('{{ asset('assets/upload/image/' . $bg->gambar) }}'); background-position: bottom center;">
    <div class="container">
        <h1>{{ $title }}</h1>
        <nav class="breadcrumbs">
            <a href="#home" class="breadcrumbs__item">Beranda</a>
            <a href="#bidang" class="breadcrumbs__item">Bidang</a>
            <a href="{{ url('berita/kategori/{par1}') }}" class="breadcrumbs__item is-active">{{ $title }}</a>
        </nav>
    </div>
</section>
<!--Inner Header End-->
<!--About Start-->
<section class="wf100 about">
    <!--About Txt Video Start-->
    <div class="about-video-section wf100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="about-text text-aws">
                        <?php echo $berita->isi; ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="#"><img src="{{ asset('assets/upload/image/' . $berita->gambar) }}"
                            alt="{{ $title }}" class="img img-fluid img-thumbnail"></a>
                </div>


            </div>
        </div>
    </div>
</section>
<!--About Txt Video End-->

<!--Service Area Start-->
<section class="donation-join wf100 p80">
    <div class="container text-center">
        <p><br><br></p>
        <h3>Daftar Bidang {{ website('namaweb') }}</h3>
        <hr>
        <div class="row justify-content-center">
            <?php foreach($layanan as $layanan) { ?>

            <div class="card col-md-6 m-2" style="max-width: 540px;">
                <div class="row justify-content-center">
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/upload/image/thumbs/' . $layanan->gambar) }}"
                            class="img-fluid rounded-start" alt="{{ $layanan->judul_berita }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                    href="{{ asset('berita/layanan/' . $layanan->slug_berita) }}">{{ $layanan->judul_berita }}</a>
                            </h5>
                            <p class="card-text">{{ $layanan->keywords }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                    ago</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <br><br>
</section>
<div class="clearfix"><br><br></div>
