<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistikKeluarLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistik_keluar_line', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('log_keluar_id');
            $table->string('nama_id', 250)->nullable();
            $table->bigInteger('qty');
            $table->bigInteger('harga');
            $table->bigInteger('grand_total')->nullable();
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
        Schema::dropIfExists('logistik_keluar_line');
    }
}
