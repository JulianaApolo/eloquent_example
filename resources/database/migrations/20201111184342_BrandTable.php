<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class BrandTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        if (!Capsule::schema()->hasTable('brands')) {
            Capsule::schema()->create('brands', function ($table) {
                 $table->increments('brand_id');
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
        Capsule::schema()->drop('brands');
    }
}
