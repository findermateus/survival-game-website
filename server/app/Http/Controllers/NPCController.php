<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateNPCCase;
use App\Http\Requests\CreateNPCRequest;
use App\Infrastructure\Repositories\Eloquent\NPCRepository;

class NPCController extends Controller
{
    public function createNPC(CreateNPCRequest $request)
    {
        $user = $request->user();
        $id = $user->id;
        $gender = $request->input('gender');
        $name = $request->input('name');
        $skinColor = $request->input('skinColor');
        $hairColor = $request->input('hairColor');

        $npcRepository = new NPCRepository();
        $createNPCCase = new CreateNPCCase($npcRepository);
        $createNPCCase->execute($id, $gender, $name, $skinColor, $hairColor);
    }
}
