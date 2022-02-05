<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Tour;

class CreateToursModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours_modules', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Tour::class)->constrained()->onDelete('cascade');
            $table->string('module_1')->nullable();
            $table->string('module_2')->nullable();
            $table->string('module_3')->nullable();
            $table->string('module_4')->nullable();
            $table->string('module_5')->nullable();
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
        Schema::dropIfExists('tours_modules');
    }
}