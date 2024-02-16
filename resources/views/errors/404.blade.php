<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops, Page Not found</title>
    <meta name="description" content="Login member area sobatcoding.com">
    <link rel="shortcut icon" href="{{ asset('assets/upload/image/iconfav.png') }}">
    <link href="{{ asset('assets/aws/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="d-flex mt-4 py-4">
        <div class="w-100">
            <div class="page-content d-flex align-items-center justify-content-center">
                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                    <img src="https://sobatcoding.com/dist/svg/404.svg" class="img-fluid mb-2" alt="404" />
                    <h2>Halaman tidak ditemukan :(</h2>
                    <p>Oops! 😖 Halaman yang kamu request tidak ditemukan di dalam server.</p>
                    <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
