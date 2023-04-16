<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boorom - Booking Room</title>

    @stack('before-style')
    @include('includes.dashboard.style')
    @stack('after-style')
    <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}">
</head>
<body>
    <div class="main-container">
        @include('layouts.dashboard.navbar')
        <main>
            <div class="container">
                <div class="gradient-1"></div>
                <div class="container-main">
                    <div data-aos="fade-up" data-aos-duration="500">
                        <h1>Temukan dan pesan ruang rapat lebih mudah dan cepat.</h1>
                    </div>
                    <p>Sistem pemesanan ruang rapat menyediakan alat sederhana untuk memesan ruang konferensi dan ruang atau sumber daya lain di dalam kantor atau tempat kerja bersama. Perangkat lunak ini memastikan penyelenggara dan peserta memiliki akomodasi yang diperlukan untuk pertemuan penting</p>
                    <div class="button">
                        <a href="{{ route('login')}}"><button class="login">Login</button></a>
                        <a href="#" class="info">Lihat Selengkapnya</a>
                    </div>
                </div>
                <div class="img">
                    <img src="{{asset('img/meetingroom.png')}}" alt="">
                </div>
            </div>
        </main>
    </div>
</body>
</html>