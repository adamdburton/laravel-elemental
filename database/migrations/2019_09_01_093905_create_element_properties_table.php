<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('element_id');
            $table->unsignedBigInteger('property_id');
            $table->boolean('bool_value')->nullable();
            $table->integer('int_value')->nullable();
            $table->float('float_value')->nullable();
            $table->string('string_value')->nullable();
            $table->text('text_value')->nullable();
            $table->json('json_value')->nullable();
            $table->timestamps();

            $table->index(['element_id', 'property_id'], 'fk_index');
            $table->index(['element_id', 'property_id', 'bool_value'], 'fk_bool_index');
            $table->index(['element_id', 'property_id', 'int_value'], 'fk_int_index');
            $table->index(['element_id', 'property_id', 'float_value'], 'fk_float_index');
            $table->index(['element_id', 'property_id', 'string_value'], 'fk_string_index');
//            $table->index(['element_id', 'property_id', 'text_value'], 'text_index');
//            $table->index(['element_id', 'property_id', 'json_value'], 'json_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element_properties');
    }
}
