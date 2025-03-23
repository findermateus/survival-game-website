<?php

namespace App\Jobs;

use App\Infrastructure\DAO\Eloquent\NpcDAO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class NPCValidatorJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $npcDAO = new NpcDAO();
        $oldestValidatedNpcList = $npcDAO->findOldestValidatedNpc(20);
        logger($oldestValidatedNpcList);
    }
}
