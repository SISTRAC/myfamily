<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned()->foreign()->refernces('id')->on('families')->delete('restrict')->update('cascade');
            $table->integer('message_id')->unsigned()->foreign()->refernces('id')->on('messages')->delete('restrict')->update('cascade');
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
        Schema::dropIfExists('family_messages');
    }
}
