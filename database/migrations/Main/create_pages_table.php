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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('sub_title')->nullable();
            $table->string('title')->default('');
            $table->string('url')->default('');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->string('category')->nullable();
            $table->tinyInteger('show')->default(1);
            $table->tinyInteger('type')->default(2); //1: blog, 2: sayfa, 3: tedarikçiler
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
        Schema::dropIfExists('pages');
    }
};
