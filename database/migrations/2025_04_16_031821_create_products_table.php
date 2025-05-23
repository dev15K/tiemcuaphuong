<?php

use App\Enums\ProductStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->longText('short_description');
            $table->longText('description');

            $table->longText('thumbnail');
            $table->longText('gallery');

            $table->decimal('price', 15, 0);
            $table->decimal('sale_price', 15, 0);
            $table->string('unit')->nullable()->comment('Đơn vị tính');

            $table->bigInteger('quantity')->default(1);

            $table->integer('views')->nullable()->default(0);
            $table->float('calc_rating')->nullable()->default(0);

            $table->timestamp('product_date')->nullable();
            $table->timestamp('expiry_date')->nullable();

            $table->string('origin')->comment('Xuất xứ');
            $table->longText('usage_instructions')->nullable()->comment('Hướng dẫn sử dụng');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references(/**/ 'id')->on('categories')->onDelete('cascade');

            $table->string('status')->default(ProductStatus::ACTIVE);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
