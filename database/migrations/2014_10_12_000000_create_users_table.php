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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('faculty_id')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Company profile
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->integer('faculty_id')->nullable()->default(null);
            $table->integer('user_id');
            $table->timestamps();
        });

        // Faculties 
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
