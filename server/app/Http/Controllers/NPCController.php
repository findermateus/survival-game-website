<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\CreateNPCCase;
use App\Domain\UseCases\GetAllNpcCase;
use App\Domain\UseCases\GetNPCCase;
use App\Domain\UseCases\UpdateNpcCase;
use App\Http\Requests\CreateNPCRequest;
use App\Infrastructure\Repositories\Eloquent\NPCRepository;
use Illuminate\Http\Request;

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

    public function getNPC(Request $request)
    {
        $user = $request->user();
        $npcRepository = new NPCRepository();
        $getNPCCase = new GetNPCCase($npcRepository);
        $npc = $getNPCCase->execute($user->id);
        return response()->json($npc);
    }

    public function updateNpc(CreateNPCRequest $request)
    {
        $npcRepository = new NPCRepository();
        $updateNpcCase = new UpdateNpcCase($npcRepository);
        $user = $request->user();
        $updateNpcCase->execute(
            $user,
            $request->input('name'),
            $request->input('gender'),
            $request->input('skinColor'),
            $request->input('hairColor')
        );
    }

    public function getAllNpc()
    {
        $npcRepository = new NPCRepository();
        $getAllNpcCase = new GetAllNpcCase($npcRepository);
        return response()->json($getAllNpcCase->execute());
    }
}
