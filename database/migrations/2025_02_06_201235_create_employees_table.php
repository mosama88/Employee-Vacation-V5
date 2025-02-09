<?php

use App\Models\Branch;
use App\Models\JobGrade;
use App\Models\WeeklyRest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_code');
            $table->string('name', 255);
            $table->string('username')->unique();
            $table->string('password')->nullable()->default('password');
            $table->string('mobile');
            $table->string('alt_mobile');
            $table->date('birth_date');
            $table->date('start_work');
            $table->string('leave_balance');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('type', ['employee', 'manager'])->nullable()->default('employee');
            $table->foreignIdFor(Branch::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(WeeklyRest::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(JobGrade::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('created_by')->references('id')->on('admins')->onUpdate('cascade');
            $table->foreignId('updated_by')->nullable()->references('id')->on('admins')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};