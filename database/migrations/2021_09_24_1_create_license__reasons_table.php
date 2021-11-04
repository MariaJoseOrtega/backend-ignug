<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('reasons', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();


            $table->string( 'name')
              ->comment('tipo de razon (permiso o licencia)');

            $table->string('description_one')
              ->comment('Maternity: can be three to six months');

            $table->string( 'description_two')
              ->comment('Maternity: by healthy that be dificult to work');

            $table->boolean('discountable_holidays')
              ->default(false)
              ->comment('If it is discountable true otherwise false');

            $table->integer('days_min')
               ->comment('minimum days to request permission');

            $table->integer('days_max')
               ->comment('maximum days to justify');

        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('reasons');
    }
}

