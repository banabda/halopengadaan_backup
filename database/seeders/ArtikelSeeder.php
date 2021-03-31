<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        $data = [
            'judul' => 'Artikel ' . $i++  ,
            'desc'  => '
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;"><strong><span style="font-size: 12.0pt;">Studi Kasus pengadaan langsung Jasa Konstruksi</span></strong></p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">&nbsp;</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Nama Peserta: Sigit Dian Affandi</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">&nbsp;</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Permasalahan:</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">&nbsp;</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Pada kementerian KL terdapat<span style="mso-spacerun: yes;">&nbsp; </span>beberapa paket pengadaan langsung jasa konstruksi dengan nilai paket pekerjaan dibawah Rp200 Juta. KPA memerintahkan PPK untuk melaksanakan kegiatan tersebut, namun demikian PPK tidak memiliki kemampuan teknis bidang teknik sipil/Konstruksi dan tidak menetapkan tim teknis atau melalui jasa konsultansi dalam penyusunan detail teknis pekerjaan, adapun HPS disusun (hanya menggunakan acuan standar biaya pemerintah daerah dan survey harga upah dan bahan). Setelah semua syarat dilengkapi PPK menyampaikan HPS dan Spek Teknis kepada Pejabat Pengadaan Barang/Jasa untuk mencari penyedia jasa tersebut. Pejabat Pengadaan yang tidak memiliki kemampuan bidang konstruksi pun tidak mereview kembali data yang disampaikan PPK dan menetapkan penyedia jasa konstruksi. Setelah serah terima pekerjaan, tahun anggaran berikutnya hasil audit BPK RI menyimpulkan bahwa pekerjaan jasa konstruksi tersebut tidak sesuai dengan spek teknis dan terdapat kelebihan volume pekerjaan yang harus dikembalikan ke Kas Negara.</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">&nbsp;</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Solusi:</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">&nbsp;</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Untuk pekerjaan jasa konstruksi KPA sebaiknya menunjuk PPK yang kompeten dibidang jasa konstruksi dan menetapkan tim teknis dan pengawas internal, konsultan perencana dan konsultan pengawas (jika diperlukan saat pelaksanaan).</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">Pejabat Pengadaan Barang/Jasa seharusnya <strong>mereview ulang data spesifikasi teknis dan HPS</strong> yang disampaikan PPK sebelum dilaksanakan pengadaan langsung dan memastikan semua data sudah benar untuk dilaksanakan pengadaan.</p>
            <p class="MsoNormal" style="text-align: justify; text-justify: inter-ideograph;">PPK beserta tim teknis, pengawas internal dan konsultan pengawas mengecek ulang pekerjaan saat Serah Terima Pekerjaan dan memastikan pekerjaan telah sesuai dengan dokumen kontrak.</p>
            ',
            'slug'  => 'studi-kasus-pengadaan-langsung-jasa-konstruksi-' . $i++,
            'foto'  => 'images/artikel/3HdSvEsKBqMChcjraifUEfqy1LBdsrt8zPjTAIwA.jpg'
        ];

        for ($i=0; $i <= 43; $i++) {
            $artikel = Artikel::create($data);
        }


    }
}
