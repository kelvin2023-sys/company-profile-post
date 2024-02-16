<?php
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config = DB::table('konfigurasi')->first();
// Nav profil
$myprofil = new Nav_model();
$nav_profilf = $myprofil->nav_profil();
$nav_layananf = $myprofil->nav_layanan();
?>
<!--Footer Start-->
<footer class="h3footer wf100">
    <div class="container">
        <div class="row">
            <!--Footer Widget Start-->
            <div class="col-md-4 col-sm-6">
                <div class="footer-widget">
                    <h3>{{ $site_config->namaweb }}</h3>
                    <p>More Information</p>
                    <hr style="border-top: solid thin #EEE;padding:0; margin: 5px 0;">
                    <p><strong>Our office:</strong>
                        <?php echo nl2br($site_config->alamat); ?>
                        <br><strong>Phone:</strong> {{ $site_config->telepon }}
                        <br><strong>Fax:</strong> {{ $site_config->fax }}
                        <br><strong>Email:</strong> {{ $site_config->email }}
                        <br><strong>Website:</strong> {{ $site_config->website }}
                    </p>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-5 col-sm-6">
                <div class="footer-widget">
                    <h3>Daftar Bidang</h3>
                    <ul class="lastest-products">
                        <?php foreach($nav_layananf as $nav_layananf) { ?>
                        <li><img src="{{ asset('assets/upload/image/thumbs/' . $nav_layananf->gambar) }}"
                                alt="{{ $nav_layananf->judul_berita }}"> <strong><a
                                    href="{{ asset('layanan/' . $nav_layananf->slug_berita) }}">{{ $nav_layananf->judul_berita }}</a></strong>
                            <span class="pdate"><i>Updated:</i> <?php echo tanggal('tanggal_id', $nav_layananf->tanggal_post); ?></span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!--Footer Widget End-->
            <!--Footer Widget Start-->
            <div class="col-md-3 col-sm-12">
                <div class="footer-widget">
                    <h3>Alamat Kantor</h3>
                    <div class="maps">
                        <iframe class="rounded"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15918.802712173127!2d102.5526752!3d-4.0812439!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e36ee92b55c3ab5%3A0x2b5967fbbff0ea8a!2sDISKOMINFO%20SELUMA!5e0!3m2!1sid!2sid!4v1706723239280!5m2!1sid!2sid"
                            width="320" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <!--Footer Widget End-->
        </div>
        <div class="row footer-copyr">
            <div class="col-md-4 col-sm-4"> <img src="{{ asset('assets/upload/image/' . $site_config->logo) }}"
                    alt="" style="max-height: 50px; width: auto;"> </div>
            <div class="col-md-8 col-sm-8">
                <p><a class="text-white" target="_blank"
                        href="https://diskominfo.selumakab.go.id">{{ $site_config->namaweb }}</a> Copyrights Reserved ©
                    {{ date('Y') }}
            </div>
        </div>
    </div>
</footer>
<!--Footer End-->
</div>
<!--   JS Files Start  -->
<script src="{{ asset('assets/aws/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/jquery-migrate-1.4.1.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/jquery.prettyPhoto.js') }}"></script>
<script src="{{ asset('assets/aws/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/aws/js/custom.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@stack('js')
</body>

</html>
