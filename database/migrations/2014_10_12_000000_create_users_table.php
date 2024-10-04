<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('position')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('roll_number')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->longText('address')->nullable();
            $table->enum('role',['admin','student','teacher'])->default('admin');
            $table->string('research_area')->nullable();
            $table->longText('profile')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
