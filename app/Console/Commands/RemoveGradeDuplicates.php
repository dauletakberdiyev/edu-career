<?php

namespace App\Console\Commands;

use App\Models\Grade;
use Illuminate\Console\Command;

class RemoveGradeDuplicates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grade:remove';

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
        $grades = Grade::all()->groupBy('user_id');

        foreach ($grades as $grade) {
            if ($grade->count() > 1) {
                $grade->shift();
                $grade->each->delete();
            }
        }

        $this->info('Duplicates removed successfully');
    }
}
