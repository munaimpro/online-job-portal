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
        Schema::create('company_employees_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('RESTRICT')->onUpdate('CASCADE');

            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company_info')
                  ->restrictOnDelete()->cascadeOnUpdate(); // Foreign key to company_info table
            
            $table->integer('company_role')->nullable(); // Set default value to 0 as Candidate, 1 for Admin and 2 for Company

            $table->string('gender');
            $table->string('contact');
            $table->string('address');
            $table->string('photo');
            $table->string('joining_date');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_employees_infos');
    }
};
