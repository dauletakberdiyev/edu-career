<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('vacancy_id')->nullable();
            $table->foreignId('term_id')->nullable();
            $table->string('agreement')->nullable();
            $table->text('reason')->nullable();
            $table->integer('type')->default(0); // 0 - industrial, 1 - academic
            $table->integer('status')->default(0); // 0 - applied, 1 - approved, 2 - rejected
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
        Schema::dropIfExists('registrations');
    }
}
