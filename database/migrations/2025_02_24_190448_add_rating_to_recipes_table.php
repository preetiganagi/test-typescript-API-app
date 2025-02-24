<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->decimal('rating', 2, 1)->default(0); // Rating between 0.0 - 5.0
        });
    }

    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};
