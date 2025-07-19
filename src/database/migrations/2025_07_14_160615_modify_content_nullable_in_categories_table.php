<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContentNullableInCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('content')->nullable()->change();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('telnumber')->nullable(); // ← 必須じゃないなら nullable() つけると楽！
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('content')->nullable(false)->change();
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('telnumber');
        });
    }
}
