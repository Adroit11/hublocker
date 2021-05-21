<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('locker_id');
            $table->foreign('locker_id')->references('id')->on('lockers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->enum("size", ["small", "medium", "large"]);
            $table->string("name");
            $table->string("description");
            $table->decimal("cost", 16, 2);
            $table->integer("quantity");
            $table->string("address");
            $table->integer("rating");
            $table->string("picture");
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
        Schema::dropIfExists('items');
    }
}
