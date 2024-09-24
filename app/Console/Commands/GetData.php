<?php

namespace App\Console\Commands;

use App\Models\Project;
use Illuminate\Console\Command;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will get the data from database';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        return 0;
    }
}
