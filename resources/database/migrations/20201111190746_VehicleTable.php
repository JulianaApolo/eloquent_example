<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class VehicleTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        if (!Capsule::schema()->hasTable('vehicles')) {
            Capsule::schema()->create('vehicles', function ($table) {
                 $table->increments('vehicle_id');
                 $table->integer('model_id')->unsigned();
                 $table->string('license_plate', 7);
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
        Capsule::schema()->drop('vehicles');
    }
}
