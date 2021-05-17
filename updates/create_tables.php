<?php namespace Mercator\Passwordless\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class CreateLoginTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mercator_passwordless_tokens', function ($table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_type');
            $table->string('identifier')->index();
            $table->string('token')->index();
            $table->datetime('expires');
            $table->string('scope');
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
        Schema::drop('mercator_passwordless_tokens');
    }
}
