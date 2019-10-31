<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSchemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_schema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('is_full_url')->default(1);   // whether this is a full link to article or partial link
            $table->text('css_expression');    // expression defines the selectors structure for this item i.e (a > p) find all p tags inside a
            $table->string('full_content_selector');

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
        Schema::dropIfExists('item_schema');
    }
}
