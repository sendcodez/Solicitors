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
        Schema::create('solicitors', function (Blueprint $table) {
            $currentYear = date('Y');
            $startingId = intval($currentYear . '000001');
            $table->id=$startingId;
            $table->string('fullname');
            $table->string('address');
            $table->string('contact_no')->nullable();
            $table->string('purpose');
            $table->integer('status')->default(1);           
            $table->timestamps();
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
