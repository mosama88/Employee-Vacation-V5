<?php

use App\Models\Employee;
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
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->string('vacation_code');
            $table->enum('type_vacation', ['emergency', 'regular', 'satisfied', 'annual']);
            $table->date('from');
            $table->date('to');
            $table->string('reasonse', 500)->nullable();
            $table->enum('status', ['hold', 'approved', 'refused'])->nullable();
            $table->foreignIdFor(Employee::class)->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('vacations');
    }
};