<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('outboxid')->nullable();
            $table->Integer('ministry_id')->nullable();
            $table->string('sendoutdepartment')->nullable();
            $table->string('sendoutuniversity')->nullable();
            $table->Integer('department_id')->nullable();
            $table->string('outbox_detail')->nullable();
            $table->date('out_date')->nullable();
            $table->string('content')->nullable();
            $table->string('sendministry_id')->nullable();
            $table->string('senddept')->nullable();
            $table->string('senduniversity')->nullable();
            $table->date('senddate')->nullable();
            $table->string('sendby')->nullable();
            $table->string('filelink')->nullable();
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
        Schema::dropIfExists('outboxes');
    }
}
