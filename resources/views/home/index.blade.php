<!--Slider Start-->

<section id="home-slider" class="owl-carousel owl-theme wf100 -mb-4">
    <?php foreach($slider as $slider) { ?>
    <div class="item">
        <div class="slider-caption h3slider">
            <div data-aos="fade-up" class="container">
                <?php if($slider->status_text=="Ya") { ?>
                <h1 class="text-white font-weight-bold">DISKOMINFO SELUMA<br>
                    AKURAT, INFORMATIF, CERGAS, TANGGUH, <br> MELAYANI SEPENUH HATI</h1>
                <?php } ?>
            </div>
        </div>
        <img src="{{ asset('assets/upload/image/' . $slider->gambar) }}" alt="">
    </div>
    <?php } ?>
</section>
<!--Slider End-->
<!--Service Area Start-->
<section class="donation-join wf100">
    <div class="container text-center rounded-lg">
        <h3 class=" text mt-2">Daftar Bidang Diskominfo Seluma</h3>
        <div class="row m-0 justify-content-center py-4">
            <?php foreach($layanan as $layanan) { ?>

            <div data-aos="fade-up" class="bidang shadow p-2">
                <br>
                <img src="{{ asset('assets/upload/image/thumbs/' . $layanan->gambar) }}"
                    alt="{{ $layanan->judul_berita }}" class="img img-thumbnail">
                <div class="volbox">
                    <a href="{{ asset('berita/layanan/' . $layanan->slug_berita) }}">
                        <h6>{{ $layanan->judul_berita }}</h6>
                    </a>
                    <p>{{ Str::limit($layanan->keywords), 10 }}</p>
                    <a href="{{ asset('berita/layanan/' . $layanan->slug_berita) }}" class="btn">Selengkapanya</a>
                </div>
            </div>
            <!--box  end-->
            <?php } ?>
        </div>
    </div>
</section>
<!--Service Area End-->
<section class="wf100 about">
    <!--About Txt Video Start-->
    <div class="about-video-section wf100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-text">
                        <h5 data-aos="fade-up">TENTANG DINAS</h5>
                        <h2 data-aos="zoom-in">{{ $site_config->nama_singkat }}</h2>
                        <?php echo $site_config->tentang; ?>

                    </div>

                </div>
                <div class="col-lg-5 text-center" data-aos="fade-up">
                    <a href="#"><img src="{{ asset('assets/upload/image/' . $site_config->gambar) }}"
                            alt="{{ $site_config->nama_singkat }}"
                            class="img img-fluid img-thumbnail  align-item-center justify-content-center" width="250"
                            height="250">
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Txt Video End-->
<!--About Section Start-->
<section class="home2-about wf100 p100 gallery"
    style="background: url({{ asset('assets/aws/images/news-artilcesbg.jpg') }}) no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div data-aos="zoom-in" class="video-img"> <a href="https://youtu.be/{{ $video->video }}"
                        data-rel="prettyPhoto" title="{{ $video->judul }}"><i class="fas fa-play"></i></a> <img
                        src="{{ asset('assets/upload/image/' . $video->gambar) }}" alt=""> </div>
            </div>
            <div class="col-md-7">
                <div class="h2-about-txt">
                    <h3 data-aos="zoom-in">SELUMA ALAP</h3>
                    <h2 data-aos="zoom-in">{{ $video->judul }}</h2>
                    <p data-aos="fade-up"><?php echo strip_tags($video->keterangan); ?></p>
                    <a class="aboutus" href="https://youtu.be/{{ $video->video }}">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!--About Section End-->
{{-- slider biasa --}}
<section id="home-slider" class="owl-carousel owl-theme">
    <?php foreach($carousel as $carousel) { ?>
    <div class="item">

        <div class="container">
            <?php if($carousel->status_text=="Ya") { ?>
            {{-- <strong>{{ strip_tags($slider->isi) }}</strong> --}}
            <h1>{{ $slider->judul_galeri }}</h1>
            {{-- <a href="{{ $slider->website }}">Baca detail</a> --}}
            <?php } ?>

            <img src="{{ asset('assets/upload/image/' . $carousel->gambar) }}" alt="">
        </div>
        <?php } ?>
</section>
{{-- end slider biasa --}}
<!--Blog Start-->
<section class="h2-news wf100 p80 blog">
    <div class="blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title-2">
                        <h2>Berita & Updates</h2>
                    </div>
                </div>
                <div class="col-md-6"> <a href="{{ asset('berita') }}" class="view-more">Lihat berita lainnya</a>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row p-4 align-items-center justify-content-center"
                style="background-color: white; padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">
                <?php foreach($berita as $berita) { ?>
                <!--Blog Small Post Start-->
                <div class="border rounded text-center p-1" style="width: 20rem;">
                    <div class="blog-post">
                        <div class="blog-thumb"> <a href="{{ asset('berita/read/' . $berita->slug_berita) }}"><i
                                    class="fas fa-link"></i></a> <img
                                src="{{ asset('assets/upload/image/thumbs/' . $berita->gambar) }}"
                                alt="><?php echo $berita->judul_berita; ?>" class="img img-thumbnail"> </div>
                        <div class="post-txt">
                            <h5><a href="{{ asset('berita/read/' . $berita->slug_berita) }}"><?php echo $berita->judul_berita; ?></a>
                            </h5>
                            <ul class="post-meta">
                                <li> <a href="{{ asset('berita/read/' . $berita->slug_berita) }}"><i
                                            class="fas fa-calendar-alt"></i>
                                        {{ tanggal('tanggal_id', $berita->tanggal_post) }}</a> </li>
                                <li> <a href="{{ asset('berita/kategori/' . $berita->slug_berita) }}"><i
                                            class="fas fa-sitemap"></i> {{ $berita->nama_kategori }}</a> </li>
                            </ul>
                            <p><?php echo \Illuminate\Support\Str::limit(strip_tags($berita->isi), 100, $end = '...'); ?></p>
                        </div>
                    </div>
                </div>
                <!--Blog Small Post End-->
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<!--Blog End-->
<section class="testimonials-section bg-white wf100 p80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-2 text-center">
                    <h2>Download</h2>
                </div>
                <div id="testimonials" class="owl-carousel owl-theme">
                    <?php 
               $kategori_download = DB::table('kategori_download')
                    ->orderBy('kategori_download.urutan','ASC')
                    ->get();
               foreach($kategori_download as $kategori_download) {
               ?>
                    <!--testimonials box start-->
                    <div class="item">
                        <h4><?php echo $kategori_download->nama_kategori_download; ?></h4>
                        <hr>
                        <?php echo \Illuminate\Support\Str::limit(strip_tags($kategori_download->keterangan), 100, $end = '...'); ?>
                        <div class="tuser">
                            <a href="{{ asset('download/kategori/' . $kategori_download->slug_kategori_download) }}"
                                class="btn btn-success"><i class="fa fa-laptop"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <!--testimonials box End-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Testimonials End-->
