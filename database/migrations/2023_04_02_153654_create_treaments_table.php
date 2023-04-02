<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->integer('diagnosis_id')->default(0);
            $table->integer('status')->default(0);
            $table->integer('service_id')->default(0)->comment('Dieu tri');
            $table->integer('unit_price')->default(0);
            $table->integer('quality')->default(0);
            $table->integer('discount')->default(0);
            $table->integer('total_amount')->default(0);
            $table->integer('note')->default(0);

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
        Schema::dropIfExists('treaments');
    }
}
