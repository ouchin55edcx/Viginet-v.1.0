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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->enum('attack', ['TypeA', 'TypeB', 'TypeC']);
            $table->text('description');
            $table->boolean('is_nonymous')->default(0);
            $table->string('callback')->nullable();
            $table->enum('status', ['en attente', 'approved', 'in process', 'solved'])->default('en attente');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('expert_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('expert_id')->references('id')->on('experts')->nullOnDelete();
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
        Schema::dropIfExists('complaints');
    }
};
