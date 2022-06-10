<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_objects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->string('description')->nullable();
            $table->integer('status_id')->nullable()->default(1);
            $table->integer('status_type_id');
            $table->integer('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_objects');
    }
}
