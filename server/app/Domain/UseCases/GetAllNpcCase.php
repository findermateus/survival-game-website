<?php

namespace App\Domain\UseCases;

use App\Domain\DAO\GenderDAOInterface;
use App\Domain\DAO\NpcDAOInterface;
use App\Domain\DAO\SkinColorDAOInterface;

class GetAllNpcCase
{
    public function __construct(
        private readonly NpcDAOInterface       $npcDAO,
        private readonly SkinColorDAOInterface $skinColorDAO,
        private readonly GenderDAOInterface    $genderDAO
    )
    {
    }

    public function execute(): array
    {
        $npcList = $this->npcDAO->fetch();
        $genderList = $this->genderDAO->get();
        $skinColorList = $this->skinColorDAO->get();
        return $this->buildResponse($npcList, $skinColorList, $genderList);
    }

    private function buildResponse($npcData, $skinColorList, $genderList): array
    {
        $genders = array_column($genderList, null, 'id');
        $skinColors = array_column($skinColorList, null, 'id');
        $response = [];
        foreach ($npcData as $npc) {
            $skinColorId = $npc['skin_color_id'];
            $genderId = $npc['gender_id'];
            $response[] = [
                'npcId' => $npc['id'],
                'npcName' => $npc['name'],
                'hairColor' => $npc['hair_color'],
                'accountId' => $npc['account_id'],
                'skinColor' => [
                    'id' => $skinColorId,
                    'value' => $skinColors[$skinColorId]['skin_color_hex'],
                    'name' => $skinColors[$skinColorId]['skin_color_name']
                ],
                'gender' => [
                    'id' => $genderId,
                    'name' => $genders[$genderId]['gender_name']
                ],
                'attributes' => []
            ];
        }
        return $response;
    }

}
