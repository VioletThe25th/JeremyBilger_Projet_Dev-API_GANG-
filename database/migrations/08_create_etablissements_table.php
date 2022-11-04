<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissements', function (Blueprint $table) {
            $table->unsignedBigInteger('gang_id')->nullable();
            $table->foreign('gang_id')
                ->references('id')
                ->on('gangs')
                ->onUpdate('cascade')
                ->onDelete('cascade'); 
            $table->id();
            $table->string('name', 55);
            $table->string('type', 55);
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
        Schema::dropIfExists('etablissements');
    }
};
