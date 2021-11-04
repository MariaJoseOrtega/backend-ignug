<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('holidays', function (Blueprint $table)  {
            $table->id();
            $table->timestamps();
            $table->softDeletes();


            $table->foreignId('employee_id')
            ->comment('fk nombre del trabajador Losep.Cod.')
            ->constrained('license_work.employees');

            $table->integer('number_days')
            ->comment('Número de dás de licencias y permisos');

            $table->integer('year')
            ->comment('Año de vacaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('holidays');    }
}
