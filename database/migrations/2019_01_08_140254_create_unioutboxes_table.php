<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnioutboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unioutboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->nullable();
            $table->text('content')->nullable();
            $table->string('filelink')->nullable();
            $table->integer('status')->nullable();
            $table->text('recontent')->nullable();
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
        Schema::dropIfExists('unioutboxes');
    }
}
