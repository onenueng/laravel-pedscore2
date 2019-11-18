<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sap_id');
            $table->string('full_name');
            $table->string('subject');
            $table->interger('academic_year');
            $table->interger('class');
            $table->float('no1');
            $table->float('no2');
            $table->float('no3');
            $table->float('no4');
            $table->float('no5');
            $table->float('no6');
            $table->float('no7');
            $table->float('no8');
            $table->float('no9');
            $table->float('no10');
            $table->float('no11');
            $table->float('no12');
            $table->float('no13');
            $table->float('no14');
            $table->float('no15');
            $table->float('total');
            $table->float('percent');
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
        Schema::dropIfExists('crqs');
    }
}
