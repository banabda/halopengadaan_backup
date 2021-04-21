<?php

namespace App\Console\Commands;

use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class AutoDeleteChat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deletechat';

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
        $chats = Chat::all();
        foreach ($chats as $chat) {
            if ($chat->created_at->addDays(1)->format('Y-m-d') < Carbon::now()->format('Y-m-d')) {
                $chat->delete();
            }
        }
        return 0;
    }
}
