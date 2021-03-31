// Terkonfirmasi
        $profile = Profile::with('user')->where('user_id', Auth::user()->id)->first();
        if (is_null($profile)) {
            return redirect()->route('profile');
        } else {
            $data = Invoice::with('user')->where([
                ['user_id', Auth::user()->id],
                ['status', 'Menunggu Pembayaran']
            ])->orWhere('status', 'Telah Terbayar')->get();

            if(request()->ajax()){
                return DataTables::of($data)
                  ->addColumn('total_tagihan', function($tagihan){
                      return 'Rp. '.number_format($tagihan->tagihan,0, ',', '.');
                  })
                  ->addColumn('tanggal', function($tanggal){
                      return Carbon::parse($tanggal->updated_at)->format('d F Y');
                  })
                  ->addColumn('paket_detail', function($paket){
                      if ($paket->paket == "1") {
                          return 'Silver';
                      }
                      elseif ($paket->paket == "2") {
                          return 'Gold';
                      }
                      else {
                          return 'Platinum';
                      }
                  })
                  ->addColumn('action', function($action){
                      $btn = '<a class="btn btn-md btn-info mr-2" href="'. route("user.dashboard.cetak", $action->id) .'">
                  <i class="fa fa-print mr-2"></i>cetak</a>';
                  return $btn;
                  })
                  ->rawColumns(['total_tagihan', 'tanggal', 'paket_detail', 'action'])
                  ->addIndexColumn()
                  ->make(true);
            }
        }