<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class RentTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        if (!Capsule::schema()->hasTable('rents')) {
            Capsule::schema()->create('rents', function ($table) {
                 $table->increments('rent_id');
                 $table->integer('vehicle_id')->unsigned();
                 $table->integer('customer_id')->unsigned();
                 $table->dateTime('rent_date', 0);
                 $table->dateTime('return_date', 0)->nullable();
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
        Capsule::schema()->drop('rents');
    }
}
