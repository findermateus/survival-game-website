<?php

namespace App\Jobs;

use App\Infrastructure\DAO\Eloquent\NpcDAO;
use App\Infrastructure\Repositories\Eloquent\NPCRepository;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Client\Response;
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

    public function handle(): void
    {
        $npcDAO = new NpcDAO();
        $npcList = $npcDAO->findOldestValidatedNpc(100);
        if (empty($npcList)) {
            return;
        }

        $request = [];
        foreach ($npcList as $npc) {
            $request[] = [
                'id' => $npc->id,
                'name' => $npc->name
            ];
        }

        $response = $this->requestOpenAi($request);
        $data = $response->json();

        Log::info('OpenAI Response:', [
            'response' => $data
        ]);

        $invalidNames = array_column($data['invalid_names'], 'id', 'reason');
        $this->updateNpcList($invalidNames, $npcList);
    }

    private function requestOpenAi($request): PromiseInterface|Response
    {
        $systemMessage = "Você é um moderador que verifica nomes ofensivos. Retorne apenas os nomes inválidos junto ao ID e a razão em um json {invalid_names: [{id: id, name: name, reason: reason}]}";
        return Http::withHeaders([
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
    }

    private function updateNpcList($invalidNames, $npcList){
        $npcRepository = new NPCRepository();
        foreach ($npcList as $npc) {
            if (in_array($npc->id, $invalidNames)) {
                $reason = array_search($npc->id, $invalidNames);
                $npcRepository->reprove($npc->id, $reason);
                continue;
            }
            $npcRepository->approve($npc->id);
        }
    }
}
