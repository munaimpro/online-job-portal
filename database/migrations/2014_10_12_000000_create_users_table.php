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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('role')->default(0); // Set default value to 0 as Candidate, 1 for Admin and 2 for Company
            
            // $table->unsignedBigInteger('company_id')->nullable();
            // $table->foreign('company_id')->references('id')->on('company_info')
            //         ->onDelete('RESTRICT')->onUpdate('CASCADE'); // Foreign key to company_info table

            //$table->integer('company_role')->nullable(); // Set default value to 0 as Candidate, 1 for Admin and 2 for Company

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
