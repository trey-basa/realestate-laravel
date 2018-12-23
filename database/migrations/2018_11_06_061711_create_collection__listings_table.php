<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_listings', function (Blueprint $table) {
            $table->integer('listing_id')->unsigned();
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->integer('collection_id')->unsigned();
            $table->foreign('collection_id')->references('id')->on('collections');
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
        Schema::dropIfExists('collection__listings');
    }
}
