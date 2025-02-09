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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // حقل الصورة
            $table->string('name'); // حقل الاسم
            $table->text('description'); // حقل الوصف
            $table->decimal('price', 10, 2); // حقل السعر
            $table->date('invoice_date'); // حقل التاريخ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
