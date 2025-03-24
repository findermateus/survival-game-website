<?php

namespace App\Domain\UseCases;

use App\Domain\Repositories\NPCRepositoryInterface;
use App\Exceptions\NPC\NPCNotFoundException;
use App\Models\Account;

class UpdateNpcCase
{
    public function __construct(private readonly NPCRepositoryInterface $npcRepository)
    {
    }

    public function execute(Account $account, $name, $gender, $skinColor, $hairColor)
    {
        $npc = $this->npcRepository->find($account->id);

        if (empty($npc)){
            throw new NPCNotFoundException('Npc não encontrado para o usuário.');
        }

        $npcEntity = $npc['npc'];
        if ($npcEntity->name != $name) {
            $this->npcRepository->addNpcToValidationQueue($npcEntity);
        }

        $this->npcRepository->updateNpc($npcEntity, $name, $gender, $skinColor, $hairColor);
    }
}
