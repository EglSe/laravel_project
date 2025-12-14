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
        Schema::table('conferences', function (Blueprint $table) {
            // Pridedame naują stulpelį, nurodant privalomą numatytąją reikšmę
            $table->string('lecturer')->default('Nenurodyta')->after('address')->nullable(false);
        });
    }

    public function down(): void
    {
        Schema::table('conferences', function (Blueprint $table) {
            $table->dropColumn('lecturer');
        });
    }
};
