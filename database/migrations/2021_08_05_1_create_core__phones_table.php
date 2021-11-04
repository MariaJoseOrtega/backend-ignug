<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_CORE'))->create('phones', function (Blueprint $table) {
            $table->id();
            $table->morphs('phoneable');

            $table->foreignId('operator_id')
                ->nullable()
                ->constrained('core.catalogues')
                ->comment('CNT, MOVISTAR, CLARO');

            $table->foreignId('location_id')
                ->nullable()
                ->constrained('core.locations')
                ->comment('Para obtener el codido de pais');

            $table->foreignId('type_id')
                ->nullable()
                ->constrained('core.catalogues')
                ->comment('Celular, convencional, fax');

            $table->boolean('main')
                ->default(false)
                ->comment('Para saber si es el telefono principal');

            $table->string('number');

            $table->softDeletes();
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
        Schema::connection(env('DB_CONNECTION_CORE'))->dropIfExists('phones');
    }
}
