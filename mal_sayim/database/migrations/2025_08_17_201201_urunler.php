<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('urunler', function(Blueprint $table){
            $table->id();
            // $table->unsignedBigInteger("istif_id");// depo_id idi bu 
            $table->string("name");
            $table->integer("count");
            $table->timestamps();

            $table->foreignId('istif_id')->references('id')->on('istifs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urunler');
    }
};