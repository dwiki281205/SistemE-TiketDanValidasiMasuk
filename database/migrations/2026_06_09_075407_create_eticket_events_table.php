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
    Schema::create('eticket_events', function (Blueprint $table) {
        $table->id();
        $table->string('title', 200);
        $table->text('description')->nullable();
        $table->string('category', 50)->nullable();
        $table->string('venue', 200);
        $table->date('event_date');
        $table->time('event_time')->nullable();
        $table->integer('total_seats');
        $table->decimal('price', 10, 2)->default(0);
        $table->string('organizer_name')->nullable();
        $table->string('contact')->nullable();
        $table->string('poster')->nullable();
        $table->enum('status', ['open','sold_out','done','cancelled'])->default('open');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eticket_events');
    }
};
