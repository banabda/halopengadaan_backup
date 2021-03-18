@extends('layouts.app')
@section('content')
<div class="section-one" id="section-one">
    @include('components.navbar')
    <div class="container">
        <nav aria-label="breadcrumb" style="margin-top: 65px; ">
            <ol class="breadcrumb" style="background-color: inherit; padding-left: 0px">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>


        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <h2 class="pl-2" style="font-size: 45px; font-weight: 590">Ini Title</h2>
                        <p class="pl-2 text-muted d-inline additional-information"><i class="far fa-eye"></i> 27 views </p>
                        <p class="pl-2 text-muted d-inline additional-information"><i class="far fa-clock"></i> 27 views </p>
                    </div>
                </div>
                <div class="card shadow" style="border-radius: 15px">
                    <img src="https://d1bpj0tv6vfxyp.cloudfront.net/articles/490905_16-3-2021_12-22-53.jpeg" style="border-radius: 10px 10px 0 0" class="card-img-top" alt="...">
                    <div class="card-body">
                      {{-- <h5 class="card-title">Card title</h5> --}}
                      <p class="card-text mt-3 text-justify">
                        Halodoc, Jakarta – Hypnobirthing adalah filosofi persalinan yang mengajarkan self-hypnosis sebagai media untuk melahirkan secara alami. Ibu mungkin saja pernah mendengar tentang ini di media sosial, yang sering dianggap sebagai kelahiran tenang tanpa rasa sakit. Apakah memang benar demikian?

                        Meskipun terdengar mustahil, faktanya ada saja bumil yang sukses melahirkan dengan metode hypnobirthing. Persiapan seperti apa yang perlu dilakukan bila ingin melahirkan dengan konsep hypnobirthing? Informasi selengkapnya baca di sini!

                        Baca juga: Fakta Medis Seputar Bius Epidural saat Persalinan

                        Bagaimana Metode Hypnobirthing Dilakukan
                        Hypnobirthing mengajarkan banyak konsep kunci yang sama dengan metode persalinan alami lainnya. Misalnya, gagasan bahwa perempuan memiliki hak untuk memahami dan menolak intervensi, kelahiran adalah proses alami dan normal yang tidak memerlukan campur tangan rutin, serta perempuan harus diizinkan untuk didampingi oleh orang yang mendukungnya.

                        Ada beberapa keyakinan inti tentang yang membuat hypnobirthing berbeda. Berikut adalah persiapan dan hal yang harus diketahui mengenai konsep hypnobirthing.

                        1. Keyakinan tentang Proses Melahirkan

                        Hypnobirthing meyakini bahwa melahirkan tidak harus menyakitkan dan bukan peristiwa yang harus ditakuti. Keyakinan akan rasa sakit yang tak tertahankan ini bersama dengan rasa takut menyebabkan ketegangan dalam tubuh. Ketegangan dalam tubuh memicu rasa sakit, yang menyebabkan lebih banyak ketakutan, yang mengarah pada lebih banyak ketegangan dan lebih banyak rasa sakit.

                        Hypnobirthing mengajari seorang perempuan bahwa tubuhnya sudah tahu cara melahirkan dan yang harus dilakukan adalah rileks. Jika bumil bisa rileks dan membiarkan tubuh bekerja melalui persalinan dan melahirkan, bumil akan mengalami hanya sedikit ketidaknyamanan. Kelahiran berubah dari proses yang menyakitkan dan menakutkan menjadi pengalaman yang memberdayakan dan dapat ditoleransi.

                        2. Kontraksi dan Nyeri Vs Lonjakan dan Tekanan

                        Bahasa adalah bagian besar dari hypnobirthing. Alih-alih mengalami kontraksi (yang membuat pikiran sesak dan ketegangan fisik), instruktur hypnobirthing akan mengganti kata-kata yang memberikan impresi sakit dengan sesuatu yang lebih positif dan dapat ditoleransi.

                        Perubahan bahasa ini mungkin tampak tidak masuk akal bagi mereka yang pernah mengalami nyeri hebat saat melahirkan. Penggunaan bahasa yang lebih positif tidak dimaksudkan untuk mengabaikan atau menyangkal pengalaman traumatis menyakitkan yang dialami beberapa bumil saat melahirkan.

                        Baca juga: Ketahui Kelebihan dan Kekurangan Persalinan dengan Vakum

                        Menggunakan bahasa positif dimaksudkan untuk mengurangi pesan sosial negatif yang bumil dapatkan tentang persalinan. Hal tersebut juga memberikan pikiran kesempatan untuk mempertimbangkan bahwa melahirkan tidak harus menjadi pengalaman yang menakutkan dan menyakitkan. Beberapa bumil yang berhasil menggunakan metode ini telah melaporkan bahwa kontraksi sebenarnya lebih terasa seperti "tekanan" dan bukan "nyeri".

                        3. Self-Hypnosis dan Relaksasi

                        Sesuai dengan namanya, hypnobirthing sangat menekankan pada hipnosis sebagai alat menuju pengalaman kelahiran yang positif. Ini bukanlah jenis hipnosis yang mungkin pernah bumil lihat di mana seseorang "mengendalikan" orang lain. Bumil tetap memegang kendali penuh atas diri dan pikiran sendiri.

                        Audio dan skrip relaksasi disediakan untuk bumil dengarkan dan berlatih berulang kali. Bumil dapat memilih skrip mana yang paling cocok untuk fokus pada hal tersebut. Saat tubuh dalam keadaan rileks, menurut hypnobirthing, tubuh dapat melanjutkan proses persalinan. Kontraksi lebih efektif dan rasa takut cenderung tidak menghentikan persalinan.

                        Ada berbagai skrip yang disediakan misalnya, ada skrip yang fokus pada relaksasi umum, ada skrip yang fokus pada pikiran positif atau afirmasi tentang proses kehamilan dan persalinan, dan skrip yang ditujukan untuk persalinan aktif pada tahap persalinan.

                        Baca juga: Ketahui Dampak Husband Stitch pada Proses Persalinan

                        Mendengarkan audio hypnobirthing secara berulang adalah kunci sukses dengan metode ini. Tanpa latihan dan mendengarkan ulang, self-hypnosis kemungkinan besar tidak akan terjadi. Punya pertanyaan lain mengenai persalinan dan kesehatan ibu hamil? Tanyakan saja pada dokter melalui Halodoc. Tanpa perlu repot, ibu bisa berdiskusi dengan dokter kapan dan di mana saja. Yuk, download aplikasinya sekarang ya!
                      </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 section-two-artikel">
                <h3>Artikel Terkait</h3>
                @for ($i = 1; $i <= 5; $i++)
                <div class="card artikel-card w-100 shadow-sm" style="border-radius: 15px">
                <div class="row">
                    <div class="col-12 col-md-6 image-div-artikel-terkait">
                        <img class="image-artikel-terkait" src="https://d1bpj0tv6vfxyp.cloudfront.net/articles/803370_17-3-2021_11-45-17-thumbnail.jpeg" alt="" srcset="" >
                    </div>
                    <div class="col-12 col-md-6 artikel-terkait" >
                        <h3 class="font-artikel-terkait"> Ketahui 4 Efek Samping Melakukan Veneer Gigi Lorem ipsum dolor sit amet</h3>
                        <p class="time-artikel-terkait">20 Jam Lalu</p>
                    </div>
                </div>
                </div>
                <hr>
                @endfor
            </div>
        </div>

    </div>
</div>


@endsection
