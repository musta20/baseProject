<?php

namespace App\Console\Commands;

use App\Models\TasksNotify;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NotifayMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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

  /*       $tasks = TasksNotify::with('user')->whereMonth('exp',Carbon::now()->month())
            ->whereYear('exp', Carbon::now()->year())
            ->get();

            foreach ($tasks  as $value) {
               //mail::
            }
 */


        return 0;
    }
}
