<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_service');
            $table->unsignedBigInteger('id_offer')->nullable();
            $table->unsignedBigInteger('id_payment_method');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->date('date');
            $table->float('lat');
            $table->float('long');
            $table->time('time');
            $table->unsignedFloat('total');
            $table->string('ubication');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_service')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_offer')->references('id')->on('offers')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_payment_method')->references('id')->on('payment_methods')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
