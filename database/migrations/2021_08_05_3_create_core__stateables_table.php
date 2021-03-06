<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreStateablesTable extends Migration
{

    public function up()
    {
        Schema::connection(env('DB_CONNECTION_CORE'))->create('stateables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('state_id')
                ->constrained('core.states');

            $table->morphs('stateable');

            $table->unique(['state_id','stateable_id','stateable_type']);
        });
    }

    public function down()
    {
        Schema::connection(env('DB_CONNECTION_CORE'))->dropIfExists('stateables');
    }
}
