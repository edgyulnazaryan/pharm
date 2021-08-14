<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state');
            $table->string('license');
            $table->date('date');
            $table->string('marker');
            $table->string('pharm_id');
            $table->integer('producer_id');
            $table->integer('material_id');
            $table->timestamps();
            
            //  PHARM TO DRUG    : many to many
            //  DRUG TO MATERIAL : one to many
            //  DRUG TO PRODUCER : many to many
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drugs');
    }
}
