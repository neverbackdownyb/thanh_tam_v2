<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partients', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->default(0);
            $table->string('name')->default('');
            $table->string('status')->default('');
            $table->string('avatar')->default('');
            $table->integer('birth_day')->default(0);
            $table->integer('province_id')->default(0);
            $table->integer('district')->default(0);
            $table->integer('ward')->default(0);
            $table->string('note')->default('');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partients');
    }
}
