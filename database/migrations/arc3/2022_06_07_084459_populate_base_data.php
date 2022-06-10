<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class PopulateBaseData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            ['format'=>'string', 'title'=> 'Строка'],
            ['format'=>'integer', 'title'=> 'Целое число'],
            ['format'=>'boolean', 'title'=> 'Переключатель'],
            ['format'=>'date', 'title'=> 'Дата'],
            ['format'=>'float', 'title'=> 'Дробь'],
            ['format'=>'enum', 'title'=> 'Перечисление'],
            ['format'=>'coordinates', 'title'=> 'Координаты'],

        ];
        DB::table('field_formats')->insert($data);


        $data = [
            ['name'=>'update workObject', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'delete workObject', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'create workObject', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'view workObject', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'update workObjectType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'delete workObjectType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'create workObjectType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'view workObjectType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'update statusType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'delete statusType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'create statusType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'view statusType', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'update additionalAttribute', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'delete additionalAttribute', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'create additionalAttribute', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],
            ['name'=>'view additionalAttribute', 'guard_name'=> 'web','comment'=>'workObject','created_at'=>Carbon::now()],

        ];
        DB::table('permissions')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
