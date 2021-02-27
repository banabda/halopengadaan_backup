<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            @if ($invoice->status == "Menunggu Pembayaran")
                <h3 class="page-title">Konfirmasi Pembayaran</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Daftar Konsultasi</li>
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
                        </ol>
                    </nav>
                </div>
            @elseif($invoice->status == "Telah Terbayar")
                <h3 class="page-title">Menunggu Konfirmasi </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Daftar Konsultasi</li>
                            <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
                        </ol>
                    </nav>
                </div>
            @elseif($invoice->status == "Terkonfirmasi")
                <h3 class="page-title">Pembayaran Terkonfirmasi </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Daftar Konsultasi</li>
                            <li class="breadcrumb-item active" aria-current="page">Pembayaran Terkonfirmasi</li>
                        </ol>
                    </nav>
                </div>
            @else
            
            @endif
        </div>
    </div>
</div>
