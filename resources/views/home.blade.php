@extends('layouts.app')

@section('body')
    
<body>
    <section class="content bg-white vh-100">
        <div class="content-left">
            <div class="row">
            <h1>Selamat Datang di Arkamaya Internship</h1>
            <p>Bergabunglah dengan Kami Hari Ini dan Buka Pintu Menuju Karir Yang Sukses!</p>
            <p>Daftar Sekarang untuk Mengikuti Program Internship Kami.</p>
                <div class="button-container">
                    <button class="custom-button">Daftarkan Institusi anda >></button>
                </div>
            </div>
        </div>
        <div class="content-right">
            <img src="{{ url("assets/images/img-home.jpg") }}" alt="Gambar Home">
        </div>
    </section>
    <section class="centered-section">
        <div class="content-2">
            <h2>Dapatkan pengalaman internship di PT.Arkamaya Sekarang</h2>
            <a href="#" class="content-button">Daftar Sekarang</a>
        </div>
    </section>
</body>

@endsection
