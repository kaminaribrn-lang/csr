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

        Schema::table('aksi', function (Blueprint $table) {
            if (! Schema::hasColumn('aksi', 'catatan_verifikasi')) {
                $table->text('catatan_verifikasi')->nullable()->after('status_verifikasi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasTable('aksi')) {
            return;
        }

        Schema::table('aksi', function (Blueprint $table) {
            if (Schema::hasColumn('aksi', 'catatan_verifikasi')) {
                $table->dropColumn('catatan_verifikasi');
            }
        });
    }
};
