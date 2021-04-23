<?php

namespace App\Console\Commands;

use App\Models\NarasumberProfile;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoRemoveNarasumberFromRoom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:narasumber';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $narasumbers = NarasumberProfile::all();
        $rooms = Room::all();
        foreach ($narasumbers as $narasumber) {
            if (Carbon::parse($narasumber->last_online)->addMinutes(10)->format('d.m.y H:i') == Carbon::now()->format('d.m.y H:i')) {
                foreach ($rooms as $room) {
                    if ($room->narasumber_id == $narasumber->user_id) {
                        $room->update([
                            'narasumber_id' => null,
                            'narasumber_name' => null,
                        ]);
                    }
                }
            }
        }
        return 0;
    }
}
