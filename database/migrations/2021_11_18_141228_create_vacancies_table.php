<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('quota');
            $table->integer('faculty_id')->nullable()->default(null);
            $table->integer('type')->default(0); // 0 - industrial, 1 - academic
            $table->timestamps();
        });

        Schema::create('user_vacancy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('vacancy_id')->nullable();
            $table->foreignId('company_id')->nullable();
            $table->integer('status')->default(0); // 0 - applied, 1 - accepted, 2 - rejected, 3 - registered
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
        Schema::dropIfExists('vacancies');
    }
}
