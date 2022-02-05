<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->boolean('approved')->default(false);
            $table->string('approved_by')->nullable()->default(null);
            $table->boolean('cancelled')->default(false);
            $table->string('cancelled_by')->nullable()->default(null);
            $table->integer('passengers');
            $table->string('boarding_at');
            $table->text('diet')->nullable();
            $table->float('total_price');
            $table->date('boarding_date');
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
        Schema::dropIfExists('tickets');
    }
}