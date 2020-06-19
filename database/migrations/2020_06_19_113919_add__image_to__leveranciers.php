<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToLeveranciers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leveranciers', function (Blueprint $table) {
            $table->string('image')->nullable()->after('Vrij_veld')->default("DefaultLeverancierImage.jpg");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_leveranciers', function (Blueprint $table) {
            //
        });
    }
}
