<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->string('description');
            $table->string('publisher');
            $table->date('created');
            $table->string('image')->nullable();
            $table->string('genres');
            $table->string('language');
            $table->integer('pages');
            $table->float('price');
            $table->integer('quantityAvailable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

