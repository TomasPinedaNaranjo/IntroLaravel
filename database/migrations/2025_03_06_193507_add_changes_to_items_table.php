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
        Schema::table('items', function (Blueprint $table) {
            // Agregar la columna order_id
            $table->unsignedBigInteger('order_id')->after('subtotal');
            // Agregar la columna product_id
            $table->unsignedBigInteger('product_id')->after('order_id');

            // Definir las claves foráneas
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            // Eliminar las claves foráneas
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);

            // Eliminar las columnas
            $table->dropColumn('order_id');
            $table->dropColumn('product_id');
        });
    }
};
