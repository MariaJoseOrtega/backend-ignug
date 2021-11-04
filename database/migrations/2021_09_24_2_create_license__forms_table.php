<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('forms', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();

            $table->foreignId('employer_id')
                ->comment('Id del empleador')
                ->constrained('license_work.employers');

            $table->string('code')
            ->comment('Código del formulario');

            $table->text('description')
            ->comment('Formulario de Licencias y Permisos');

            $table->string('regime')
            ->comment('Losep.Codigo de trabajo');

            $table->float('days_const')
            ->default(135/99)
            ->comment('1.363636');

            $table->integer('approved_level')
                ->comment('Nivel de aprobación que debe tener el formulario 1 2 3 4 etc');

            $table->boolean('state')
                ->comment('estado del formulario true activo false inactivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('forms');
    }
}
