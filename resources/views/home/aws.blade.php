<?php
$bg = DB::table('heading')->where('halaman', 'AWS')->orderBy('id_heading', 'DESC')->first();
?>

@php
    $galery = DB::Table('galeri')->where('jenis_galeri', 'Galeri')->get();
@endphp
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
<!--Inner Header Start-->
<section class="wf100 p82 inner-header mb-3"
    style="background-image: url('{{ asset('assets/upload/image/' . $bg->gambar) }}'); background-position: bottom center;">
    <div class="container">
        <h1>{{ $title }}</h1>

        <nav class="breadcrumbs">
            <a href="#home" class="breadcrumbs__item">Beranda</a>
            {{-- <a href="#download" class="breadcrumbs__item">file</a> --}}
            <a href="#" class="breadcrumbs__item is-active">{{ $title }}</a>
        </nav>
    </div>

</section>
<!--Inner Header End-->
<section class="container">
    <h1 class="seluma">Diskominfo Seluma</h1>
    <hr>
</section>
<section>
    <div class="container shadow bg-white rounded">
        <div class="row p-5">
            <div class="col-md-3 mb-3 display-6">
                <ul class="nav nav-pills d-inline-flex border rounded p-3" id="experienceTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#snit" role="tab"
                            aria-controls="home" aria-selected="true">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tupoksi-tab" data-toggle="tab" href="#devs" role="tab"
                            aria-controls="tupoksi" aria-selected="false">Tugas Pokok dan Fungsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="struktur-tab" data-toggle="tab" href="#opsi" role="tab"
                            aria-controls="struktur" aria-selected="false">Struktur Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#leader" role="tab"
                            aria-controls="leader" aria-selected="false">Profil Pejabat</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-9">
                <div class="tab-content" id="experienceTabContent">

                    <div class="tab-pane fade show active text-left text-light" id="snit" role="tabpanel"
                        aria-labelledby="home-tab">
                        <h3>Sejarah</h3>
                        <span class="date-range code-font">Other Details</span>

                        <ul class="pt-2">
                            <img src="{{ asset('assets/aws/images/office copy.jpg') }}"
                                class="img img-thumbnail rounded mb-3" style="width: 600px">
                            <li>
                                <p>Dinas Komunikasi dan Informatika Kabupaten Seluma sebagai Organisasi Perangkat
                                    Daerah yang membidangi penyebarluasan informasi, pengembangan dan pendayagunaan
                                    teknologi informasi komunikasi.
                                </p>
                            </li>
                            <li>
                                <p>Pemerintah Kabupaten Seluma membentuk
                                    Dinas Komunikasi dan Informatika Kabupaten Seluma
                                    dengan Peraturan Daerah Kabupaten Seluma No. 8 Tahun 2016
                                    Tentang Organisasi Perangkat Daerah

                                </p>
                            </li>
                            <li>
                                <p>Kedudukan, Susunan Organisasi
                                    dan Tata Kerja : <span class="font-weight-bold">Peraturan Bupati Seluma Nomor 31
                                        Tahun 2016
                                        Peraturan Bupati Seluma Nomor 265 Tahun 2017
                                        Peraturan Bupati Seluma Nomor 10 Tahun 2018
                                    </span>

                                </p>
                            </li>
                            <li>Melaksanakan Urusan Pemerintahan Daerah di Bidang Komunikasi dan Informatika serta
                                Persandian dan Statistik berdasarkan asas Otonomi dan Tiugas Pembantuan
                                .

                                </span>

                                </p>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-pane fade text-left text-light" id="devs" role="tabpanel"
                        aria-labelledby="tupoksi-tab">
                        <h3>Tugas Pokok dan Fungsi</h3>
                        <span class="date-range code-font">Other Details</span>
                        <ul class="pt-2">
                            <div class="text-center">
                                <a href="#"><img src="{{ asset('assets/upload/image/' . $site_config->gambar) }}"
                                        alt="{{ $site_config->nama_singkat }}" class="img img-thumbnail"
                                        style="width: 150px"></a>
                                <h2 class="text-bold">{{ $site_config->nama_singkat }}</h2>
                                <?php echo $site_config->tentang; ?>
                            </div>
                        </ul>
                    </div>
                    <div class="tab-pane fade text-left text-light" id="opsi" role="tabpanel"
                        aria-labelledby="tupoksi-tab">
                        <h3>Struktur Organisasi</h3>
                        <span class="date-range code-font">Other Details</span>
                        <ul class="pt-2">
                            <img class="img rounded shadow"
                                src="{{ asset('assets/aws/images/STRUKTUR-KOMINFO21.png') }}" width="100%"
                                height="auto" />
                        </ul>
                    </div>
                    <div class="tab-pane fade text-left text-light" id="leader" role="tabpanel"
                        aria-labelledby="leader-tab">
                        <h3>Profil Pejabat</h3>
                        <span class="date-range code-font">Other Details</span>
                        <ul class="row pt-2">
                            <div class=" row d-flex justify-content-center">
                                <?php foreach($kategori_staff as $kategori_staff) { 
               $id_kategori_staff = $kategori_staff->id_kategori_staff;
               $staff    = DB::table('staff')
               ->where(array('status_staff'=>'Ya','id_kategori_staff'=>$id_kategori_staff))
               ->orderBy('urutan','DESC')
               ->get();
               if($staff) {
               ?>

                                <?php foreach($staff as $staff) { ?>
                                <!--Blog Post Start-->
                                <div class="col-lg-4 col-md-6 py-2">
                                    <div class="event-post">
                                        <div class="card-img-top"> <a href="#"></a> <img
                                                src="{{ asset('assets/upload/staff/' . $staff->gambar) }}"
                                                alt="{{ $staff->nama_staff }}" width="100%" height="auto">
                                        </div>
                                        <div class="event-txt text-center">
                                            <h6><a href="#">{{ $staff->nama_staff }}</a></h6>
                                            <p class="venue"><span>{{ $staff->jabatan }}</span></p>
                                        </div>
                                    </div>
                                </div>
                                <!--Blog Post End-->
                                <?php } ?>
                                <?php }} ?>
                            </div>
                        </ul>
                    </div>
                </div><!--tab content end-->
            </div><!-- col-md-8 end -->
        </div>
    </div>
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
                            <p class="card-text"><small class="text-body-secondary">{{ $layanan->jenis_berita }}
                                    | {{ \Carbon\Carbon::parse($layanan->tanggal)->format('d/m/Y') }}</small>
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
{{-- <section class="donation-join wf100 p80">

</section> --}}
