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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('information')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('phone')->nullable();
            $table->text('prefecture')->nullable();
            $table->text('City')->nullable();
            $table->text('address')->nullable();
            $table->string('businessHours')->nullable();
            $table->string('station')->nullable();
            $table->string('regularHoliday')->nullable();
            $table->string('home_page')->nullable();
            $table->string('twitter')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('Facebook')->nullable();
            $table->boolean('is_selling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
