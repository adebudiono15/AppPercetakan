<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistikMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistik_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 30);
            $table->string('supplier_id', 250);
            $table->string('nama', 250);
            $table->bigInteger('qty');
            $table->date('tanggal');
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
        Schema::dropIfExists('logistik_masuk');
    }
}
