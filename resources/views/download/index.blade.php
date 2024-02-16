@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@php
    $relatedPost = DB::table('berita')->where('jenis_berita', 'berita')->orderBy('tanggal', 'ASC')->take(5)->get();
@endphp
<?php
$bg = DB::table('heading')->where('halaman', 'Dokumen')->orderBy('id_heading', 'DESC')->first();
?>
<!--Inner Header Start-->
<section class="wf100 p82 inner-header"
    style="background-image: url('{{ asset('assets/upload/image/' . $bg->gambar) }}'); background-position: top center;">
    <div class="container">
        <h1>{{ $title }}</h1>
        <nav class="breadcrumbs">
            <a href="#home" class="breadcrumbs__item">Beranda</a>
            <a href="#download" class="breadcrumbs__item">file</a>
            <a href="#" class="breadcrumbs__item is-active">{{ $title }}</a>
        </nav>
    </div>
</section>
<!--Inner Header End-->
<!--Blog Start-->
<section class="wf100 p80 blog">
    <div class="blog-grid">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <?php echo $kategori->keterangan; ?>
                    <table id="tableDownload" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Dokumen</th>
                                <th>Keterangan</th>
                                <th>Kategori</th>
                                <th>Hits</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($downloads as $download) { ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td width="30%"><a
                                        href="{{ asset('dokumen/detail/' . $download->id_download . '/' . Str::slug($download->judul_download, '-')) }}"
                                        target="_blank"><?php echo $download->judul_download; ?></a></td>
                                <td width="20%">{!! Str::words(strip_tags($download->isi), 10, '...') !!}</td>
                                <td width="10%">{{ $download->jenis_download }}</td>
                                <td><?php echo $download->hits; ?> Kali</td>
                                <td><a href="http://"><button class="btn"><a
                                                href="{{ asset('dokumen/unduh/' . $download->id_download) }}"
                                                class="btn btn-info"><i class="fa fa-download"></i>
                                                Download</a></button></a></td>
                            </tr>
                            <?php $i++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                    <span class=" font-weight-bold">BERITA TERPOPULER</span>
                    @foreach ($relatedPost as $rpos)
                        <div class="col">
                            <div class="card-recent d-flex flex-row mb-2 align-items-center justify-content-start p-2">
                                <div class="d-flex flex-column">

                                    <div class="recent-post"><a class="text-decoration-none text-dark"
                                            href="{{ asset('berita/read/' . $rpos->slug_berita) }}"><?php echo \Illuminate\Support\Str::limit(strip_tags($rpos->judul_berita), 25, $end = '...'); ?>
                                        </a></div>
                                    <div class="date-more"><small><i class="far fa-calendar">
                                                {{ \Carbon\Carbon::parse($rpos->tanggal)->translatedFormat('l, d F Y') }}
                                            </i></small></div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</section>

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush
@push('js')
    <script>
        $(document).ready(function() {
            $('#tableDownload').DataTable();
        });
    </script>
    <!--Blog End-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
@endpush
