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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('education_level', ['high_school', 'diploma', 'bachelor', 'master', 'phd', 'other'])->nullable();
            $table->string('organization_name')->nullable();
            $table->string('position')->nullable();
            $table->string('avatar');
            $table->enum('status', ['new', 'active', 'blocked', 'inactive'])->default('new');
            $table->text('summary')->nullable();
            $table->timestamps();

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('department')->nullable();

            // Professional info
            $table->enum('job_title', [
                'Specialist',
                'Consultant',
                'Assistant Professor',
                'Associate Professor',
                'Professor',
                'Head of department',
                'Registrar',
                'Senior Registrar',
                'Senior',
                'Lecturar',
                'Assistant Lecturer',
                'Resident',
                'Senior Specialist',
                'Senior Consultant',
                'Other',
            ])->nullable();

            $table->enum('degree', [
                'Board',
                'Doctorate',
                'Master',
                'Fellowship',
                'MBChB',
                'PhD',
                'Diploma',
                'High Diploma',
                'MDOption 1',
                'Other',
            ])->nullable();

            $table->enum('specialty', [
                'Dermatology',
                'Plastic Surgery',
                'ENT',
                'GP',
                'Dentistry',
                'General Surgery',
                'Family Medicine',
                'Other',
            ])->nullable();

            $table->enum('state_of_license', [
                'Active',
                'General Surgery', // seems odd, confirm if this belongs here?
                'Expired',
            ])->nullable();

            $table->enum('certifying_board', [
                'American Board',
                'Arab Board',
                'Jordanian Board',
                'Libyan Board',
                'Saudi Board',
                'Syrian Board',
                'German Board',
                'Sudanian Board',
                'Iraqi Board',
                'None of the above',
                'Other',
            ])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
