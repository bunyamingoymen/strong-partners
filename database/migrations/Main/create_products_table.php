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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->string('url');
            $table->longText('description');
            $table->string('category');
            $table->string('price');
            $table->string('cargo_company');
            $table->string('stock');
            $table->string('time');
            $table->tinyInteger('can_be_deleted')->default(1); //Silinebilir mi?
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('delete')->default(0);
            $table->string('create_user_code')->default('1');
            $table->string('update_user_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
