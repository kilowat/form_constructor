<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('label');

            $table->unsignedInteger('input_group_id');
            $table->foreign('input_group_id')
                ->references('id')->on('input_groups')
                ->onDelete('cascade');

            $table->unsignedInteger('group_option_id');
            $table->foreign('group_option_id')
                ->references('id')->on('options')
                ->onDelete('cascade');

            $table->string('input_type_code');
            $table->foreign('input_type_code')
                ->references('code')->on('input_types')
                ->onDelete('cascade');
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
        Schema::drop('inputs');
    }
}
