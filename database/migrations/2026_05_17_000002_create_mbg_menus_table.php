<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mbg_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_package');
            $table->integer('calories');
            $table->float('protein');
            $table->string('status_gizi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mbg_menus');
    }
};
