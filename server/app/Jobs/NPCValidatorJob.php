<?php

namespace App\Jobs;

use App\Infrastructure\DAO\Eloquent\NpcDAO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
        $oldestValidatedNpcList = $npcDAO->findOldestValidatedNpc(100);
        if (empty($oldestValidatedNpcList)){
            return;
        }
        $request = [];
        foreach ($oldestValidatedNpcList as $npc) {
            $request[] = [
                'id' => $npc->id,
                'name' => $npc->name
            ];
        }
        $systemMessage = "Você é um moderador que verifica nomes ofensivos. Retorne apenas os nomes inválidos junto ao ID e a razão em um json {invalid_names: [{id: id, name: name, reason: reason}]}";
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemMessage],
                ['role' => 'user', 'content' => 'Verifique se esses nomes são ofensivos ou racistas: ' . json_encode($request)],
            ],
            'response_format' => [
                'type' => 'json_object'
            ],
            'temperature' => 0.1
        ]);

        Log::info('OpenAI Response:', [
            'response' => $response->json()
        ]);
    }
}
