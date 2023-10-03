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
            $table->foreignId('product_category_id');
            $table->string('name', '100');
            $table->float('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('image', '50')->nullable();
            $table->string('tag', '100')->nullable();
            $table->enum('status', ['Active', 'Pending'])->default('Active');
            $table->tinyInteger('is_deleted')->default(0);
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
