<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPopularityToManualsTable extends Migration
{
    public function up()
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->unsignedInteger('popularity')->default(0); 
        });
    }

    public function down()
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->dropColumn('popularity');
        });
    }
}
