<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_name');
            $table->string('email')->unique();
            $table->string('federal_id')->unique();
            $table->string('password');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
