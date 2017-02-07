<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsHasInputGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_has_input_groups', function (Blueprint $table) {

            $table->unsignedInteger('forms_id');
            $table->foreign('forms_id')
                ->references('id')->on('forms')
                ->onDelete('cascade');

            $table->unsignedInteger('input_group_id');
            $table->foreign('input_group_id')
                ->references('id')->on('input_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forms_has_input_groups');
    }
}
