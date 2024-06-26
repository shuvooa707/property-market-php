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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("thumbnail");
            $table->longText("summery");
            $table->longText("description");
            $table->double("price");
            $table->unsignedInteger("bedrooms");
            $table->unsignedInteger("bathrooms");
            $table->unsignedInteger("balconies");
            $table->unsignedInteger("garages");
            $table->unsignedInteger("swimming_pool")->default(0);
            $table->unsignedInteger("hall")->default(0);
            $table->unsignedInteger("terrace")->default(0);
            $table->unsignedInteger("storeroom")->default(0);
            $table->boolean("is_available");
            $table->unsignedInteger("sqft");


            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("company_id");
            $table->unsignedBigInteger("address_id");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
