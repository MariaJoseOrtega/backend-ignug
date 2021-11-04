<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('applications', function (Blueprint $table){
            $table->id();
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('employee_id')
                ->comment('Id del empleado que realiza la licencia o permiso')
                ->constrained('license_work.employees');

            $table->foreignId('form_id')
                ->comment('Id del formulario')
                ->constrained('license_work.forms');

            $table->foreignId('reason_id')
                ->comment('Id de las razones por la cula se realiza la licencia o permiso')
                ->constrained('license_work.reasons');

            $table->foreignId('location_id')
                ->comment('Id de la localización')
                ->constrained('core.locations');

            $table->boolean('type')
                ->default(false)
                ->comment('para saber si es por fechas o por horas el permiso');

                $table->date('date_started_at')
                    ->comment('Fecha de inicio de la Licencia o Permiso');

                $table->date('date_ended_at')
                    ->comment('Fecha final de la Licencia o Permiso');

                $table->time('time_started_at')
                    ->comment('Hora de inicio de la Licencia o Permiso');

                $table->time('time_ended_at')
                    ->comment('Hora final de la Licencia o Permiso');

                $table->json('observations')
                    ->comment('Listado de observaciones');

            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('applications');
    }
}
