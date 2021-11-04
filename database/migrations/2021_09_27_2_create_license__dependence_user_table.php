<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Intervention\Image\Constraint;

class CreateLicenseDependenceUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->create('dependence_user', function ($table) {
            $table->id();

            $table->foreignId('dependence_id')
             ->comment('FK de dependence')
             ->constrained('license_work.dependences');

             $table->foreignId('user_id')
             ->comment('FK de Users')
             ->constrained('authentication.users');

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
        Schema::connection(env('DB_CONNECTION_LICENSE_WORK'))->dropIfExists('dependence_user');
    }
}
