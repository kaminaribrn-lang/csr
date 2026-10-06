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
        if (! Schema::hasTable('program_unggulan_bupati')) {
            Schema::create('program_unggulan_bupati', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('uraian_program_unggulan_bupati')) {
            Schema::create('uraian_program_unggulan_bupati', function (Blueprint $table) {
                $table->id();
                $table->foreignId('program_unggulan_bupati_id')
                    ->constrained('program_unggulan_bupati')
                    ->cascadeOnDelete();
                $table->text('uraian');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uraian_program_unggulan_bupati');
        Schema::dropIfExists('program_unggulan_bupati');
    }
};