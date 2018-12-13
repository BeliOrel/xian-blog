<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // unique -> we want this for indexing, 
            // after -> after the column 'body'
            // if you already have something in that table,
            // then there's gonna be problem because 'slug' is unique column
            // so all the already existing rows would get NULL value
            // which violates rules of unique values

            // if you use 'php artisan migrate:rollback' that should
            // take you one migration back

            // if you use 'php artisan migrate:reset' that should
            // take you all the way back at the start

            // if you use 'php artisan migrate:refresh' that should
            // undo all migrations and redo all maigrations again -> you loose all data
            // this option is the best if you already have data in your DB,
            // and you want to append a new index column
            $table->string('slug')->unique()->after('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
