<?php

use App\Models\Transaction;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete();
            $table->foreignId("product_id")->references("id")->on("products")->cascadeOnDelete();
            $table->integer("quantity");
            $table->integer("total");
            $table->string("status");
            $table->text("payment_url");
            $table->softDeletes();
            $table->timestamps();
        });

        Transaction::create([
            'user_id' => 1,
            'product_id' => 1,
            'quantity' => 3,
            'total' => 37000,
            'status' => 'CANCELLED',
            'payment_url' => 'www.google.com'
        ]);

        Transaction::create([
            'user_id' => 2,
            'product_id' => 3,
            'quantity' => 5,
            'total' => 50000,
            'status' => 'DELIVERED',
            'payment_url' => 'www.google.com'
        ]);

        Transaction::create([
            'user_id' => 2,
            'product_id' => 5,
            'quantity' => 1,
            'total' => 20000,
            'status' => 'DELIVERED',
            'payment_url' => 'www.google.com'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
