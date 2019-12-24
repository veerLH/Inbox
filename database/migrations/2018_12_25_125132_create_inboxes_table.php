<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inboxid')->nullable();
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
            $table->integer('department_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('inboxes');
    }
}
