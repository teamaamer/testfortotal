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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // id
            $table->string('title'); // course title
            $table->string('image')->nullable(); // image path
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // account foreign key
            $table->date('start_on')->nullable(); // start date
            $table->enum('status', ['new', 'active', 'blocked', 'inactive'])->default('new');
            $table->text('summary')->nullable(); // summary
            $table->longText('full_summary')->nullable();
            $table->text('requirements')->nullable(); // requirements
            $table->decimal('price', 10, 2)->default(0); // price
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
