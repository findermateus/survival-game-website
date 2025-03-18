<?php

use App\Models\Account;
use App\Models\NonPlayableCharacter;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('npc_rejections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class);
            $table->foreignIdFor(NonPlayableCharacter::class);
            $table->string('reason');
            $table->dateTime('rejected_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('npc_rejections');
    }
};
