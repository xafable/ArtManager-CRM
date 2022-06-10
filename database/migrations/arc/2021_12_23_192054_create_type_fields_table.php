<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_fields', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_eng');
            $table->string('title_ru');
            $table->integer('format_id');
            $table->tinyInteger('required');
            $table->tinyInteger('active')->default(1);
            $table->smallInteger('quantity')->default(1);
            $table->integer('enumeration_id')->nullable();
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
        Schema::dropIfExists('type_fields');
    }
}
