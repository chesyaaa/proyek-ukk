<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeGuruIdNullableOnPklsTable extends Migration
{
    public function up()
    {
        Schema::table('pkls', function (Blueprint $table) {
            $table->foreignId('guru_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pkls', function (Blueprint $table) {
            $table->foreignId('guru_id')->nullable(false)->change();
        });
    }
}
