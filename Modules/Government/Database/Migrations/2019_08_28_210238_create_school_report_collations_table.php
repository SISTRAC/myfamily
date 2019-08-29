<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolReportCollationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_report_collations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('year_id');
            $table->integer('admission')->default(0);
            $table->integer('gradutaion')->default(0);
            $table->integer('report')->default(0);
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
        Schema::dropIfExists('school_report_collations');
    }
}
