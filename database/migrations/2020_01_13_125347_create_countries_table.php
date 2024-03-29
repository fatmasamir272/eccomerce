<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
                $table->increments('id');
                $table->string('country_name_ar');
                $table->string('country_name_en');
                $table->string('mob');
                $table->string('currency');
                $table->string('code'); //eg
                $table->string('logo')->nullable(); /// TO CAN EDIT AND NOT UPLOAD THE SAME IMAGE AGAIN
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
        Schema::dropIfExists('countries');
    }
}
