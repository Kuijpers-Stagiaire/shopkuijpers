<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsers2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('achternaam')->nullable()->after('name');
            $table->string('locatie')->nullable()->after('password');
            $table->string('functie')->nullable()->after('locatie');
            $table->integer('tel1')->nullable()->after('functie');
            $table->integer('tel2')->nullable()->after('tel1');
            $table->string('avatar')->nullable()->default('user.jpg')->after('tel2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
