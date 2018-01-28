<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBattlefield extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battlefields', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('avatar_id')->nullable();
            $table->tinyInteger('seen')->default(1);
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->integer('background_id')->nullable();
            $table->integer('border_id')->nullable();
            $table->softDeletes();
        });

        foreach ([
                     'Город',
                     'Степь',
                     'Прохоровка',
                     'Малиновка',
                     'На луне',
                     'На марсе',
                     'Антарктида',
                     'Болото',
                     'Пустыня',
                 ] as $battlefield) {
            DB::table('battlefields')->insert([
                'name' => $battlefield,
            ]);
        }
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
