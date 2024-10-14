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
            $table->string('name');
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->string('filename')->nullable()->comment('Для 3d модели');
            $table->integer('price')->default(0);
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true)->comment('Товар опубликован');
            $table->string('sku')->nullable();
            $table->boolean('on_sale')->default(false)->comment('Товар участвует в распродаже');
            $table->integer('sale_price')->nullable();
            $table->timestamp('date_sale_start')->nullable();
            $table->timestamp('date_sale_end')->nullable();
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
