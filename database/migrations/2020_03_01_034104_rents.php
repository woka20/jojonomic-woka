<?php
// namespace App\Rents;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id_rent');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_product');
            $table->string('status_rent', 0)->comment('0: dipinjam, 1: kembali');
            $table->decimal('price')->nullable($value=true);
            $table->string('begin_date');
            $table->string('return_date')->nullable($value=true);
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('produks')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema:: dropIfExists('rents');
    }
}
