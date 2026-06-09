<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('event_id')->constrained('eticket_events')->onDelete('cascade');
        $table->string('buyer_name');
        $table->string('email');
        $table->string('phone')->nullable();
        $table->string('seat_number')->nullable();
        $table->string('ticket_code')->unique();
        $table->text('qr_code_data')->nullable();
        $table->timestamp('purchase_date')->useCurrent();
        $table->string('payment_method')->nullable();
        $table->enum('payment_status', ['pending','paid','refunded'])->default('pending');
        $table->boolean('is_used')->default(false);
        $table->timestamp('used_at')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
