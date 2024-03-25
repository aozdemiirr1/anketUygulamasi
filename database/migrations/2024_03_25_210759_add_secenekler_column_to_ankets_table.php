<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('ankets', function (Blueprint $table) {
        $table->json('secenekler')->nullable();
    });
}

public function down()
{
    Schema::table('ankets', function (Blueprint $table) {
        $table->dropColumn('secenekler');
    });
}
};
