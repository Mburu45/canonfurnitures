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
        Schema::table('product_images', function (Blueprint $table) {
            if (!Schema::hasColumn('product_images', 'product_id')) {
                $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade')->after('id');
            }

            if (!Schema::hasColumn('product_images', 'image_path')) {
                $table->string('image_path')->nullable()->after('product_id');
            }

            if (!Schema::hasColumn('product_images', 'is_primary')) {
                $table->boolean('is_primary')->default(false)->after('image_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            if (Schema::hasColumn('product_images', 'is_primary')) {
                $table->dropColumn('is_primary');
            }
            if (Schema::hasColumn('product_images', 'image_path')) {
                $table->dropColumn('image_path');
            }
            if (Schema::hasColumn('product_images', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
        });
    }
};
