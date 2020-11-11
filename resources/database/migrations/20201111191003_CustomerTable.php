<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CustomerTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        if (!Capsule::schema()->hasTable('customers')) {
            Capsule::schema()->create('customers', function ($table) {
                 $table->increments('customer_id');
                 $table->string('name');
                 $table->dateTime('creation_date', 0);
                 $table->dateTime('removal_date', 0)->default('0000-00-00 00:00:00');
                 $table->dateTime('modification_date', 0)->nullable();
            });
        }
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->drop('customers');
    }
}
