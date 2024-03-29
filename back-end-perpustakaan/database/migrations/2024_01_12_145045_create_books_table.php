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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn',64);
            $table->string('title', 64);
            $table->string('cover')->nullable();
            $table->integer('year');
            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
