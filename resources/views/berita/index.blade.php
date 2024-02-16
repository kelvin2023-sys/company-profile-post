<?php
$bg = DB::table('heading')->where('halaman', 'Berita')->orderBy('id_heading', 'DESC')->first();
?>

@php
    $data = DB::table('berita')->where('Jenis_berita', 'Berita')->orderBy('tanggal', 'DESC')->first();
@endphp

@php
    $relatedPos = DB::table('berita')->where('jenis_berita', 'berita')->orderBy('tanggal', 'ASC')->paginate(4);
@endphp
@php
    $relatedPost = DB::table('berita')->where('jenis_berita', 'berita')->orderBy('tanggal', 'ASC')->take(5)->get();
@endphp
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
@endpush

<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center py-lg-5   "
            style="background-image: url('{{ asset('assets/upload/image/' . $data->gambar) }}'); background-position: top center; position: relative;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.785);">
            </div>

            <div class="col-lg-6 d-flex flex-column py-5 align-item-center justify-content-center">
                <div class="d-flex justify-content-start mb-4">
                    <a href="#  "
                        class="btn btn-outline-secondary bg-opacity-10 text-primary border-secondary border p-2 fs-6 rounded-pill lh-1 d-flex align-items-center justify-content-center">
                        <span class="badge bg-danger rounded-pill px-3 text-white">Hot <i class="bi bi-fire"></i></span>
                        <span class="ms-2 text-white px-2 text-uppercase">TOPIK TERBARU {{ $data->jenis_berita }}</span>
                        <span class="ms-1">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </a>
                </div>

                <h1 class="fw-bold display-5 text-light mb-4"><a class="text-white"
                        href="{{ asset('berita/read/' . $data->slug_berita) }}">{{ $data->judul_berita }}</a></h1>
                <p class=" text-white"><?php echo \Illuminate\Support\Str::limit(strip_tags($data->isi), 150, $end = '...'); ?>
                </p>
                <a class="format text-gray" href="{{ asset('download/kategori/' . $data->slug_berita) }}"><i
                        class="far fa-calendar">
                        {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}
                    </i></a>
                <div>
                    <a href="{{ asset('berita/read/' . $data->slug_berita) }}"
                        class=" text-white btn btn-outline-secondary rounded-pill mt-3 fs-6">Baca Selengkapnya</a>
                </div>
            </div>

            <div class="col-lg-4 offset-lg">
                <div class="box-post flex p-3 rounded">
                    <span class="heading-text mb-3 p-3 ">BERITA TERKAIT</span>
                    @foreach ($relatedPos as $rpos)
                        <div class="col">
                            <div class="card-recent d-flex flex-row mb-2 align-items-center justify-content-center">
                                <div class="photo p-3"><a href="{{ asset('berita/read/' . $rpos->slug_berita) }}"><img
                                            class=" rounded"
                                            src="{{ asset('assets/upload/image/thumbs/' . $rpos->gambar) }}"
                                            width="100" height="75"></a></div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="jenis-berita uppercase">{{ $rpos->jenis_berita }}</div>
                                    <div class="judul-berita"><a class="text-white fw-bold"
                                            href="{{ asset('berita/read/' . $data->slug_berita) }}"><?php echo \Illuminate\Support\Str::limit(strip_tags($rpos->judul_berita), 50, $end = '...'); ?>
                                        </a></div>
                                    <div class="date"><small><i class="far fa-calendar">
                                                {{ \Carbon\Carbon::parse($rpos->tanggal)->translatedFormat('l, d F Y') }}
                                            </i></small></div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
</section>
<section class="kaetgori bg-white wf100 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <div id="testimonials" class="owl-carousel owl-theme">
                    <?php 
               $kategori_berita = DB::table('kategori')
                    ->orderBy('urutan','DESC')
                    ->get();
               foreach($kategori_berita as $kategori_berita) {
               ?>
                    <!--testimonials box start-->
                    <div class="item">
                        <nav class="nav nav-pills flex-column flex-sm-row">
                            <a class="flex-sm-fill text-center nav-link active rounded-pill text-uppercase font-weight-bold"
                                aria-current="page" href="#"><?php echo $kategori_berita->nama_kategori; ?></a>
                        </nav>
                        <hr>
                    </div>
                    <!--testimonials box End-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mt-4 p-0">
        <div class="row mt-4">
            {{-- blog --}}
            <div class="col-lg-7 p-3">
                <div class="future p-3">
                    @if ($data)
                        <!-- Tampilan (view) Laravel -->
                        <div class="card-post rounded-5">
                            <img src="{{ asset('assets/upload/image/thumbs/' . $data->gambar) }}"
                                class="card-img img-thumbnail" alt="..."><a
                                href="{{ asset('berita/read/' . $data->slug_berita) }}"></a>
                            <div class="card-body">
                                <small class=" text-uppercase">TOPIK HANGAT DI {{ $data->jenis_berita }}</small>
                                <h3 class="card-title"><a
                                        href="{{ asset('berita/read/' . $data->slug_berita) }}">{{ $data->judul_berita }}</a>
                                </h3>
                                <p><?php echo \Illuminate\Support\Str::limit(strip_tags($data->isi), 100, $end = '...'); ?></p>
                                <small></small>
                                <p class="card-text font-weight-bold"><small
                                        class="text-body-secondary">{{ $data->jenis_berita }}
                                        | <i class="far fa-calendar">
                                            {{ \Carbon\Carbon::parse($rpos->tanggal)->translatedFormat('l, d F Y') }}
                                        </i></small>
                                </p>
                                <div class="more">
                                    <a href="{{ asset('berita/read/' . $data->slug_berita) }}"
                                        class=" btn btn-outline-secondary rounded mt-3 fs-6">Baca
                                        Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Tidak ada data berita yang sesuai.</p>
                    @endif
                </div>
                <hr>
                @foreach ($relatedPost as $rpos)
                    <div class="col">
                        <div class="card-recent d-flex flex-row mb-2 align-items-center justify-content-start p-2">
                            <div class="photo p-2"><a href="{{ asset('berita/read/' . $rpos->slug_berita) }}"><img
                                        class=" rounded"
                                        src="{{ asset('assets/upload/image/thumbs/' . $rpos->gambar) }}" width="180"
                                        height="120"></a></div>
                            <div class="d-flex flex-column">

                                <div class="head"><a class=" font-weight-bold"
                                        href="{{ asset('berita/read/' . $data->slug_berita) }}"><?php echo \Illuminate\Support\Str::limit(strip_tags($rpos->judul_berita), 25, $end = '...'); ?>
                                    </a></div>
                                <div class="date-more"><small><i class="far fa-calendar">
                                            {{ \Carbon\Carbon::parse($rpos->tanggal)->translatedFormat('l, d F Y') }}
                                        </i></small></div>
                            </div>
                        </div>

                    </div>
                @endforeach

                {{ $relatedPos->links() }}
            </div>

            <div class="col-lg-5">
                <div class=" flex mt-4">
                    <div class="text-heading font-weight-bold fs-1">Berita Terbaru</div>
                    <hr>
                    @foreach ($relatedPos as $rpost)
                        <div class="col">
                            <div class="card-recent d-flex flex-row mb-2 align-items-center justify-content-start p-2">
                                <div class="photo p-3"><a href="{{ asset('berita/read/' . $rpost->slug_berita) }}"><img
                                            class=" rounded"
                                            src="{{ asset('assets/upload/image/thumbs/' . $rpost->gambar) }}"
                                            width="100" height="75"></a></div>
                                <div class="d-flex flex-column mb-3">
                                    <div class="head"><a class=" font-weight-bold"
                                            href="{{ asset('berita/read/' . $data->slug_berita) }}"><?php echo \Illuminate\Support\Str::limit(strip_tags($rpost->judul_berita), 50, $end = '...'); ?>
                                        </a></div>
                                    <div class="date">
                                        <small><i class="fa fa-tag" aria-hidden="true"></i>
                                            {{ $rpost->jenis_berita }}
                                            |
                                            <i class="far fa-calendar">
                                                {{ \Carbon\Carbon::parse($rpost->tanggal)->translatedFormat('l, d F Y') }}
                                            </i></small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="p-4">
                    <script type="text/javascript" src="https://widget.kominfo.go.id/gpr-widget-kominfo.min.js"></script>

                    <div id="gpr-kominfo-widget-container"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 p-0">


        </div>


    </div>
</section>

<!--Blog End-->
