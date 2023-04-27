<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_personal_infos', function (Blueprint $table) {
            $table->string('phone')->change();
            $table->string('address_number')->change();
            $table->string('complement')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_personal_infos', function (Blueprint $table) {
            $table->integer('phone')->change();
            $table->integer('address_number')->change();
            $table->string('complement')->change();
        });
    }
};
