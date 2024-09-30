<?php

namespace App\Console\Commands;

use App\Models\Grade;
use Illuminate\Console\Command;

class PutProjectDefaultGradeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'grade:project';

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
        $grades = Grade::where('project', null)->get();

        $this->info('Processing ' . $grades->count() . ' grades');
        foreach ($grades as $grade) {
            $this->info('Processing grade: ' . $grade->id);
            $grade->project = json_encode([0.0, 0.0]);
            $grade->save();
        }
        return 0;
    }
}
