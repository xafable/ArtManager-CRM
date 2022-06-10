<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeFieldWorkObjectTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_field_work_object_type', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type_field_id');
            $table->integer('work_object_type_id');
            $table->integer('fields_quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_field_work_object_type');
    }
}
