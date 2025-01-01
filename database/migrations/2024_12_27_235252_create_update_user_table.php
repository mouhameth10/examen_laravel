<?php

// create_update_user_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateUserTable extends Migration
{
    public function up()
    {
        Schema::create('update_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('update_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('read')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('update_user');
    }
}