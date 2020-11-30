<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_items', function (Blueprint $table) {
            $table->integer('year');
            $table->integer('position');
            $table->double('tax_group_1',15,8);
            $table->double('tax_group_2',15,8);
            $table->double('tax_group_perc_1',15,8);
            $table->double('tax_group_perc_2',15,8);
            $table->double('ceiling',15,8);
            $table->primary(['year','position']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_items');
    }
}
