<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('eticket_events', function (Blueprint $table) {

            $table->decimal('vip_price',10,2)
                  ->default(0)
                  ->after('price');

            $table->decimal('regular_price',10,2)
                  ->default(0)
                  ->after('vip_price');
        });
    }

    public function down(): void
    {
        Schema::table('eticket_events', function (Blueprint $table) {

            $table->dropColumn([
                'vip_price',
                'regular_price'
            ]);
        });
    }
};