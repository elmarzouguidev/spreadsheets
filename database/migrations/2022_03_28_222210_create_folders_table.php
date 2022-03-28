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
        Schema::create('folders', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->longText('description')->nullable();

            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->foreign('parent_id')->references('id')->on('folders')->onUpdate('cascade')->onDelete('set null');
            $table->integer('order')->default(1);
            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
};
