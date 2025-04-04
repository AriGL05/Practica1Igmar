<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('planet');
            $table->double('diameter_km', 30, 2);
            $table->double('mass_kg', 30, 2);
            $table->string('discovery_year')->nullable();
            $table->string('discovery_by')->nullable();
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
        Schema::dropIfExists('moons');
    }
};
