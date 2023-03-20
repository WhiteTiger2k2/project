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
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('price');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('discount_id')->constrained('discounts');
            $table->string('image');
            $table->integer('quantity');
            $table->tinyInteger('status');
            $table->tinyInteger('featured');
            $table->string('address');
            $table->text('description');
            $table->tinyInteger('active');
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
