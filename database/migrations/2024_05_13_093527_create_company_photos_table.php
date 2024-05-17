<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyPhotosTable extends Migration
{
    public function up()
    {
        Schema::create('company_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->string('photo_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_photos');
    }
}
