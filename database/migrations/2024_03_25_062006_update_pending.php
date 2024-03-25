<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $currentYear = date('Y');
        $startingId = intval($currentYear . '000001');

        DB::statement("ALTER TABLE pendings AUTO_INCREMENT = $startingId");
        DB::statement("ALTER TABLE solicitors AUTO_INCREMENT = $startingId");

        Schema::table('pendings', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
