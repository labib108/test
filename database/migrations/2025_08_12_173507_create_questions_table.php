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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('question_id');
            $table->unsignedBigInteger('group_id');
            $table->enum('type', ['mcq', 'fill_blank', 'essay', 'matching']);
            $table->text('text');
            $table->string('media_file')->nullable();
            $table->float('marks');
            $table->integer('order_no');
            $table->timestamps();

            $table->foreign('group_id')->references('group_id')->on('question_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
