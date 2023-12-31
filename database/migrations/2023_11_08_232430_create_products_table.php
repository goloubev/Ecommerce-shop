<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->decimal('price');
            $table->decimal('price_old')->nullable();
            $table->integer('count');
            $table->boolean('is_published')->default(true);

            $table->foreignId('category_id')
                ->nullable()
                ->index()
                ->constrained('categories')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('group_id')
                ->nullable()
                ->index()
                ->constrained('groups')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
