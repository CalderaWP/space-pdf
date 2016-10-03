<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name');
	        $table->integer('user_id');
	        $table->string('hash');
	        $table->integer('entry_id');
	        $table->string('form_id');
	        $table->integer('license_id');
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
        Schema::create('pdfs', function (Blueprint $table) {
            //
        });
    }
}
