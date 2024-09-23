<?php

use App\Models\Product;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('picturePath')->nullable();
            $table->text('description');
            $table->text('ingredients');
            $table->integer('price');
            $table->double('rate');
            $table->string('types');
            // $table->foreignId('user_id')->references("id")->on("users");
            $table->softDeletes();
            $table->timestamps();
        });

        Product::create([
            'name' => '(DEF) 1. Skincare',
            'picturePath' => 'assets/product/contoh1.jfif',
            'description' => 'def',
            'ingredients' => 'd, e, f',
            'rate' => random_int(1, 5),
            'price' => 19000,
            'types' => 'trending'
        ]);

        Product::create([
            'name' => 'Skincare GHI - #2',
            'picturePath' => 'assets/product/contoh2.webp',
            'description' => 'ghi',
            'ingredients' => 'g, h, i',
            'rate' => random_int(1, 5),
            'price' => 50000,
            'types' => 'recommended'
        ]);

        Product::create([
            'name' => 'Skincare 3 [ JKL ]',
            'picturePath' => 'assets/product/contoh3.jfif',
            'description' => 'jkl',
            'ingredients' => 'j, k, l',
            'rate' => random_int(1, 5),
            'price' => 10000,
            'types' => 'new, trending'
        ]);

        Product::create([
            'name' => 'Skincare #4 - MNO',
            'picturePath' => 'assets/product/contoh4.jfif',
            'description' => 'mno',
            'ingredients' => 'm, n, o',
            'rate' => random_int(1, 5),
            'price' => 32000,
            'types' => 'new'
        ]);

        Product::create([
            'name' => 'CONTOH PRODUK',
            'description' => 'contoh deskripsi produk',
            'ingredients' => 'pro, duk',
            'rate' => random_int(1, 5),
            'price' => 20000,
            'types' => 'new'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
