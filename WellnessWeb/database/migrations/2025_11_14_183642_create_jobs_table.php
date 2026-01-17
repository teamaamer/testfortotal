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
        Schema::create('careers', function (Blueprint $table) {
            $table->id(); // id
            $table->string('title'); // course title
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // account foreign key
            $table->enum('status', ['new', 'active', 'blocked', 'inactive'])->default('new');
            $table->text('summary')->nullable(); // summary
            $table->decimal('salary', 10, 2)->default(0); // salary
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
