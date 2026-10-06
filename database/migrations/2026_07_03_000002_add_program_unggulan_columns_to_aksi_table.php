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
        if (! Schema::hasTable('aksi')) {
            return;
        }

        if (! Schema::hasColumn('aksi', 'program_unggulan_bupati_id')) {
            Schema::table('aksi', function (Blueprint $table) {
                $table->unsignedBigInteger('program_unggulan_bupati_id')->nullable()->after('id_kegiatan');
            });
        }

        if (! Schema::hasColumn('aksi', 'uraian_program_unggulan_bupati_id')) {
            Schema::table('aksi', function (Blueprint $table) {
                $table->unsignedBigInteger('uraian_program_unggulan_bupati_id')->nullable()->after('program_unggulan_bupati_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('aksi')) {
            return;
        }

        if (Schema::hasColumn('aksi', 'uraian_program_unggulan_bupati_id')) {
            Schema::table('aksi', function (Blueprint $table) {
                $table->dropColumn('uraian_program_unggulan_bupati_id');
            });
        }

        if (Schema::hasColumn('aksi', 'program_unggulan_bupati_id')) {
            Schema::table('aksi', function (Blueprint $table) {
                $table->dropColumn('program_unggulan_bupati_id');
            });
        }
    }
};
