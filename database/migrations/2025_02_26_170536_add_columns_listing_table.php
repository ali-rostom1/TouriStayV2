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
        Schema::table('listings',function(Blueprint $table){
            $table->string("city");
            $table->string("country");
            $table->string("equipments");
            $table->string("description");
            $table->integer("persons");
            $table->integer("rooms");
            $table->enum("type",["Villa","Appartement","Maison","Chambre"])->default("Appartment");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("listings",function(Blueprint $table){
            $table->dropColumn("city");
            $table->dropColumn("country");
            $table->dropColumn("equipments");
            $table->dropColumn("description");
            $table->dropColumn("persons");
            $table->dropColumn("rooms");
            $table->dropColumn("type");
        });
    }
};
