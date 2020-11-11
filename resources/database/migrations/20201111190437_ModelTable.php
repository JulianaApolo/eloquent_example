<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class ModelTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        if (!Capsule::schema()->hasTable('models')) {
            Capsule::schema()->create('models', function ($table) {
                 $table->increments('model_id');
                 $table->integer('brand_id')->unsigned();
                 $table->string('description');
                 $table->dateTime('creation_date', 0);
                 $table->dateTime('modification_date', 0)->nullable();
                 $table->dateTime('removal_date', 0)->default('0000-00-00 00:00:00');
            });
        }
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->drop('models');
    }
}
