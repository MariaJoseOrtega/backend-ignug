<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('employers', function (Blueprint $table){
            $table->id();
            $table->softDeletes();
            $table->timestamps();

            $table->string('logo')
            ->comment('logo de senescyt');

            $table->string('department')
            ->comment('departamento de la senescyt');

            $table->string('coordination')
            ->comment('Sub.Fom. Técnica y Tecnológica');

            $table->string('unit')
            ->comment('Nombre del Instituto');

            $table->string('approval_name')
            ->comment('Nombre de al persona quien aprueba');

            $table->string('register_name')
            ->comment('Senescyt_Talento_Humano');

        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('employers');
    }
}
