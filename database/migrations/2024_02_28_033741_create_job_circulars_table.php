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
        Schema::create('job_circulars', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('company_info')
                  ->restrictOnDelete()->cascadeOnUpdate(); // Foreign key to company_info table
            
            $table->UnsignedBigInteger('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')
                ->restrictOnDelete()->cascadeOnUpdate(); // Foreign key to job_categories table

            $table->string('organization_name');
            $table->string('designation');
            $table->date('application_deadline');
            $table->string('company_logo')->nullable();
            $table->integer('vacancy_count');
            $table->string('job_location');
            $table->decimal('minimum_salary', 10, 2);
            $table->date('published_date');
            $table->text('education');
            $table->text('experience');
            $table->text('requirements');
            $table->text('responsibilities');
            $table->text('benefits');
            $table->string('employment_status');
            $table->tinyInteger('status')->default(0);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_circulars');
    }
};
