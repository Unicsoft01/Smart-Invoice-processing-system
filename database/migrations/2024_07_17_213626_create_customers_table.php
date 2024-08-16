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
        // CustomerID, Name, ContactDetails, A`ddress, etc.
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customerName')->nullable();
            $table->string('vendor_contact')->nullable();
            $table->string('email')->nullable();
            
            $table->string('account_number')->nullable();
            $table->string('bank_name')->nullable();

            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
