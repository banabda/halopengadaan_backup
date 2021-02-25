<?php

namespace App\Console\Commands;

use App\Models\UserhasPaket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckExpiredUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'userhaspaket:checkExpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron Untuk Pengecekan Expired At';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userHasPaket = UserhasPaket::with('user')->where('status', 'Aktif')->get();

        foreach ($userHasPaket as $key => $value) {
            $expired_at = $value->expired_at;
            
            if ($expired_at <= Carbon::now()) {
                $update = UserhasPaket::find($value->id);
                $update->status = 'Tidak Aktif';
                $update->save();
            }
        }

    }
}
