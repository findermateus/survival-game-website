<?php

namespace App\Console\Commands;

use App\Jobs\NPCValidatorJob;
use Illuminate\Console\Command;

class ComandoTeste extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:comando-teste';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        NPCValidatorJob::dispatch();
    }
}
