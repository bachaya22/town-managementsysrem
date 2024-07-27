<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_plots', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // $table->string('customer');
            $table->string('plotno');
            $table->string('type');
            $table->string('categories');
            $table->string('length');
            $table->string('width');
            $table->string('marla');
            $table->string('price');
            $table->string('down_payment');
            $table->string('total_amount');
            $table->string('description');
            $table->tinyInteger('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
