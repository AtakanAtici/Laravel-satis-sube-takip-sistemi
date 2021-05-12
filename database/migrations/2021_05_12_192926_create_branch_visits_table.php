<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_visits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('personelID');
            $table->bigInteger('branchID');
            $table->integer('status')->default(0);
            $table->longText('image')->nullable();
            $table->longText('personel_location')->nullable();
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
        Schema::dropIfExists('branch_visits');
    }
}
