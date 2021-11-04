<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthenticationTransactionalCodesTable extends Migration
{
    public function up()
    {
        Schema::connection(env('DB_CONNECTION'))->create('transactional_codes', function (Blueprint $table) {
            $table->id();

            $table->string('username');

            $table->string('token')
                ->index();

            $table->boolean('used')
                ->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::connection(env('DB_CONNECTION'))->dropIfExists('transactional_codes');
    }
}
