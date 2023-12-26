<?php

namespace App\Console\Commands;

use App\Models\TourPlan;
use Illuminate\Console\Command;
use Carbon\Carbon;

class TourUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tours:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tousrs is active column';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now();
        $fullDate = "$now->year-$now->month-$now->day";
        TourPlan::where('end_time', $fullDate)->update(['is_active' => 0]);
        $this->info('Tour statuses updated successfully.');
        // return Command::SUCCESS;
    }
}