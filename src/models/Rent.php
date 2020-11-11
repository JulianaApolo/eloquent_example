<?php
namespace Models;

class Rent extends BaseModel
{
    protected $table = 'rents';

    protected $primaryKey = 'rent_id';

    protected $fillable = ['return_date', 'rent_date', 'customer_id', 'vehicle_id'];

    public function vehicle()
    {
        return $this->hasOne('Models\Vehicle', 'vehicle_id', 'vehicle_id');
    }

    public function customer()
    {
        return $this->hasOne('Models\Customer', 'customer_id', 'customer_id');
    }
}
