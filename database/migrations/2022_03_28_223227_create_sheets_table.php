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
        Schema::create('sheets', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->unique();
            $table->string('code')->unique();

            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->longText('content');
            
            $table->fullText(['name','description','content']);

            $table->foreignId('user_id')
                //->index()
                ->constrained();
            //->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheets');
    }
};
