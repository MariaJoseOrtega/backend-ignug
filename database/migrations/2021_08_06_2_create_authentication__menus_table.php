<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthenticationMenusTable extends Migration
{
    public function up()
    {
        Schema::connection(env('DB_CONNECTION'))->create('menus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('authentication.menus')
                ->comment('Un menu puede tener menus hijos');

            $table->string('label');

            $table->string('router_link')->nullable();

            $table->text('description')->nullable();

            $table->text('color')->comment('color en hexadecimal')->default('#9c9c9c');

            $table->string('type')
                ->nullable()
                ->comment('Para categorizar los menus');

            $table->string('icon')->nullable()->comment('Icono de la libreria que se usa en el frontend');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection(env('DB_CONNECTION'))->dropIfExists('menus');
    }
}
