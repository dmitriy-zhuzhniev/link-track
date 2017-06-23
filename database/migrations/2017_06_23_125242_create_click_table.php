<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('click', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('ua', 128);
            $table->string('ip', 100);
            $table->string('ref');
            $table->string('param1', 100);
            $table->string('param2', 100)->nullable();
            $table->unsignedInteger('error');
            $table->unsignedInteger('bad_domain');

            $table->unique(['ua', 'ip', 'ref', 'param1']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('click');
    }
}
