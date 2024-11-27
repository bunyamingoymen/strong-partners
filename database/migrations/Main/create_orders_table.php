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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('order_code')->unique();
            $table->string('receipt_file')->nullable()->default('');
            $table->string('invoice_file')->nullable()->default('');
            $table->string('price')->nullable();
            $table->string('price_without_vat')->nullable();
            $table->string('cargo_price')->nullable();
            $table->tinyInteger('status'); //0: Ödeme bekleniyor, 1:Onay Bekleniyor, 2: Kargoda, 3: Onaylandı
            $table->tinyInteger('archive')->default(0); //Sipariş arşivlendi mi?
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
