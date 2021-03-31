@extends('layouts.app')
@section('content')

@include('components.navbar')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<br><br><br><br><br>
<h2 style="text-align: center">Frequently Asked Questions (FAQ)</h2>
<h3 style="text-align: center">Halopengadaan</h3>
<br><br>
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            1. Bagaimana cara daftar akun user di sistem halo pengadaan?
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
              <li>Klik menu mambership lalu klik registrasi</li>
              <li>Masukan nama lengkap, email, password, dan konfirmasi password</li>
              <li>Klik registrasi</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2. Bagaimana cara membuat profil akun halo pengadaan?
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <ul>
                <li>Setelah melakukan registrasi akan diarahkan ke halaman profil</li>
                <li>Isi data diri anda dengan lengkap: foto profil, nama lengkap, email, nomor hp, alamat rumah,alamat kerja, jenis kerja, status.</li>
            </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3. Apakah data profil yang sudah dilengkapi bisa di ubah?
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <ul>
                <li>login ke akun halo pengadaan anda </li>
                <li>Anda dapat mengubah data seperti foto profil, nama lengkap, email, nomor hp, alamat rumah,alamat kerja, jenis kerja,status.</li>
                <li>Klik submit (data anda otomatis terupdate)</li>
            </ul>
        </div>
      </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            4. Metode pembayaran apa saja yang dapat digunakan di halopengadaan?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              <h6><strong>Tansfer Bank</strong></h6>
              <p> - Anda dapat menggunakan metode pembayaran transfer manual caranya:</p>
            <ul>
                <li>Klik daftar konsultasi</li>
                <li>Isi data diri</li>
                <li>Isi pemilihan paket</li>
                <li>Isi pemilihan pembayaran</li>
                <li>Lakukan transfer bank jangan melewati waktu yang tersedia</li>
                <li>Kemudian klik konfirmasi pembayaran untuk upload bukti pembayaran</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
              5. Bagaimana cara menjadi membership halo pengadaan?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              <ul>
                  <li></li>
                  <li></li>
                  <li></li>
              </ul>
          </div>
        </div>
      </div>
  </div>
@endsection

