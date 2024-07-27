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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->string('email');
            $table->string('cnic');
            $table->string('phone');
            $table->foreignId('add_plot_id')->constrained('add_plots')->cascadeOnDelete();
            $table->integer('marla');
            $table->string('plot_type');
            $table->string('categories');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_type', ['full_payment', 'installment_plan']);
            $table->integer('num_installments')->nullable();
            $table->decimal('installment_payment', 10, 2)->nullable();
            $table->decimal('total_payment', 10, 2)->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
