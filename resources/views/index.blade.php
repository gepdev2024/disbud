@extends('layouts/blankLayout')

@section('title', 'AdHoc - Disbud')
<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />
<style>
    path.leaflet-interactive:focus {
        outline: none;
    }

    .leaflet-popup-content {
        width: 1000px;
        overflow-y: scroll;
    }
</style>

<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>

@section('content')
<nav class="navbar navbar-example navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img width="25" src="{{asset('assets/img/logo.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-2"
            aria-controls="navbar-ex-2" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-ex-2">
            <div class="navbar-nav me-auto">
                <a class="nav-item nav-link active" href="/">Home</a>
                <a class="nav-item nav-link" href="/WBB">WBB</a>
                <a class="nav-item nav-link" href="/WBTB">WTB</a>
            </div>

            <span class="navbar-text">Peta Infografis Cagar Budaya Propinsi Riau</span>
        </div>
    </div>
</nav>

<main>
    <!-- Hero Section -->
    <section class="hero bg-dark text-light text-center py-5">
        <div class="container">
            <h1>Selamat Datang</h1>
            <p></p>
            <a href="#start" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </section>

    <!-- About Section -->
    <section class=" py-5" id="start">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Apa Yang Dimaksud WBB ?</h2>
                    <p style="text-align:justify">
                        Warisan Budaya Benda adalah warisan budaya yang bisa diindera dengan
                        mata dan tangan, misalnya berbagai artefak atau situs yang ada di sekitar kita. Termasuk di
                        dalamnya adalah candi-candi dan arsitektur kuno lainnya, sebilah keris, gerabah/keramik, sebuah
                        kawasan, dan lain-lain. Warisan Budaya Benda atau biasa dikenal dengan Cagar Budaya terbagi
                        menjadi beberapa kategori diantaranya yaitu : 1. Benda 2. Bangunan 3. Struktur 4. Situs 5.
                        Kawasan Pada sistem ini terdapat menu analisa spasial berupa Daerah Potensi Kerusakan, dimana
                        jika terdapat jumlah item > 2 maka daerah tersebut dinyatakan berpotensi kerusakan Warisan
                        Budaya Benda
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <!-- You can add an image here -->
                    <i style="font-size: 400px" class=" bx bx-building-house"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class=" bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <i style="font-size: 400px" class=" bx bx-palette"></i>
                </div>
                <div class="col-md-6">
                    <h2>Apa Yang Dimaksud WBTB ?</h2>
                    <p style="text-align:justify">
                        Warisan Budaya Tak Benda (WBTB) adalah berbagai praktik, representasi, ekspresi, pengetahuan,
                        keterampilan, instrumen, obyek, artefak, dan ruang-ruang budaya yang terkait. Dalam beberapa
                        kasus, masyarakat, kelompok, atau seseorang juga dapat menjadi bagian dari warisan budaya tak
                        benda. Warisan budaya tak benda diwariskan dari generasi ke generasi, yang akhirnya diciptakan
                        kembali oleh masyarakat dan suatu kelompok. Selain itu, warisan budaya tak benda memberikan rasa
                        identitas yang berkelanjutan, untuk menghargai perbedaan budaya dan kreativitas manusia. Warisan
                        Budaya Tak Benda diklasifikasikan menjadi beberapa jenis / domain diantaranya yaitu : 1.
                        Keterampilan dan Kemahiran Kerajinan Tradisional 2. Seni Pertunjukan 3. Pengetahuan dan
                        Kebiasaan Perilaku Mengenai Alam Semesta 4. Tradisi Lisan dan Ekspresi 5. Adat Istiadat
                        Masyarakat, Ritual dan Perayaan-Perayaan Pada menu WBTB di sistem kali ini terdapat analisa
                        spasial untuk menentukan Top List Kota / Kabupaten berdasarkan jenis domainnya. Jumlah item WBTB
                        hingga saat ini (2022) yaitu 64 item, dimana tiap tahunnya akan dilaksanakan verifikasi item
                        secara nasional untuk menentukan item warisan budaya tak benda pada suatu daerah.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection