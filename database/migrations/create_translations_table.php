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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->longText('key'); // Örneğin 'welcome'
            $table->string('language'); // Örneğin 'tr', 'en'
            $table->longText('value'); // Çeviri değeri
            $table->tinyInteger('type'); // type= 0 admin sayfası, type=1 index sayfası, type=2 kullanıcı giriş sayfası
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
