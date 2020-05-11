<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('leveranciers', function (Blueprint $table) {
            $table->id();
            $table->string('Bedrijf_naam');
            $table->string('Bedrijf_adres');
            $table->string('Bedrijf_postcode');
            $table->string('Bedrijf_plaats');
            $table->string('Bedrijf_telefoonnr');
            $table->string('Accountmanager_naam');
            $table->string('Accountmanager_telefoonnr');
            $table->string('Accountmanager_email');
            $table->string('Accountmanager_inkoopvoorwaarden')->nullable();
            $table->string('Accountmanager_Algemeneinfo', 3000)->nullable();
            $table->string('Contactpersoon_sales');
            $table->string('Contactpersoon_support');
            $table->string('Sales_emailorders')->nullable();
            $table->string('Sales_support')->nullable();
            $table->string('Vrij_veld', 3000)->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leverancier_id')->constrained();
            $table->string("product_naam");
            $table->integer("product_aantal");
            $table->decimal("product_prijs",8,2);
            $table->string("product_merk");
            $table->string("product_serie");
            $table->string("product_model");
            $table->string("product_omschrijving")->nullable();
            $table->string("product_extra_informatie", 3000)->nullable();
            $table->timestamps();
        });

        Schema::create('Winkelwagen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('aantal');
            $table->timestamps();
        });

        Schema::create('bestellingen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('aantal');
            $table->decimal('totaal_prijs',8,2);
            $table->string('adres');
            $table->string('postcode');
            $table->string('plaats');
            $table->timestamps();
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
