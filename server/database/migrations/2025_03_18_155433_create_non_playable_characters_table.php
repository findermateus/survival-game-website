<?php

use App\Models\Account;
use App\Models\Gender;
use App\Models\SkinColor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('non_playable_characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hair_color');
            $table->foreignIdFor(Account::class);
            $table->foreignIdFor(Gender::class);
            $table->foreignIdFor(SkinColor::class);
            $table->string('approval_status')->default(\App\Core\NpcStatus::Pending->name);
            $table->dateTime('approved_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('non_playable_characters');
    }
};
