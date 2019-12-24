<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('inboxid')->nullable();
            $table->date('receive_date')->nullable();
            $table->Integer('ministry_id')->nullable();
            $table->string('senddept')->nullable();
            $table->string('senduniversity')->nullable();
            $table->string('sendbranch')->nullable();
            $table->string('inbox_detail')->nullable();
            $table->string('inbox_no')->nullable();
            $table->date('out_date')->nullable();
            $table->string('content')->nullable();
            $table->string('receiver')->nullable();
            $table->string('filelink')->nullable();
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
        Schema::dropIfExists('temp_inboxes');
    }
}
