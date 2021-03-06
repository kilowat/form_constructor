<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kalnoy\Nestedset\NestedSet;

class CreateInputGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_groups', function (Blueprint $table) {
            NestedSet::columns($table);
            $table->increments('id');
            $table->string('name');
            $table->integer('sort')->default(100);
            $table->boolean('active')->default(true);
            $table->integer('column')->default(1);
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
        Schema::drop('input_groups');
    }
}
