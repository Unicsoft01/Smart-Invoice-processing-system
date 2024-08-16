<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // InvoiceItems Table: ItemID, InvoiceID, ProductID, Quantity, Price, etc.
        // Products Table: ProductID, Name, Description, Price, Stock, etc.
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceID')->nullable();
            $table->string('productName')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();
            $table->string('inStock')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
