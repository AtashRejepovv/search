<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->unsignedBigInteger('phone_type_id');
            $table->foreign('phone_type_id')->references('id')->on('phone_types')->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name')->nullable(TRUE);
            $table->string('father_name')->nullable(TRUE);
            $table->unsignedInteger('kathedra_id')->nullable(TRUE);
            $table->foreign('kathedra_id')->references('id')->on('kathedras')->onDelete('cascade');
            $table->unsignedInteger('battalion_id')->nullable(TRUE);
            $table->foreign('battalion_id')->references('id')->on('battalions')->onDelete('cascade');
            $table->unsignedInteger('rota_id')->nullable(TRUE);
            $table->foreign('rota_id')->references('id')->on('rotas')->onDelete('cascade');
            $table->unsignedInteger('platoon_id')->nullable(TRUE);
            $table->foreign('platoon_id')->references('id')->on('platoons')->onDelete('cascade');
            $table->unsignedInteger('service_id')->nullable(TRUE);
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedInteger('position_id')->nullable(TRUE);
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->unsignedInteger('rank_id')->nullable(TRUE);
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->string('phone');
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
        Schema::dropIfExists('numbers');
    }
}
