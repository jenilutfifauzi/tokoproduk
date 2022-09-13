<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('id_categories')
                  ->unsignedInteger()
                  ->change();
            $table->foreign('id_categories')
                  ->references('id_categories')
                  ->on('product_categories')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->integer('id_variants')
                  ->unsigned()
                  ->change();
            $table->foreign('id_variants')
                  ->references('id_variants')
                  ->on('variants')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->integer('id_categories')->change();
            $table->integer('id_variants')->change();

            $table->dropForeign('product_id_categories_foreign');
            $table->dropForeign('product_id_variants_foreign');
        });
    }
}
