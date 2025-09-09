<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('istifs', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger("depo_id");
            $table->string("istif_name");
            $table->timestamps();

            $table->foreignId("depo_id")->references("id")->on("depolar")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('istifs');
    }
};
