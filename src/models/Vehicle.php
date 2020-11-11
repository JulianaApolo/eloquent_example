<?php
namespace Models;

class Vehicle extends BaseModel
{
    protected $table = 'vehicles';

    protected $primaryKey = 'vehicle_id';

    protected $fillable = ['license_plate'];

    public function model()
    {
        return $this->hasOne('Models\Model', 'model_id', 'model_id');
    }

    public function rent()
    {
        return $this->hasMany('Models\Rent', 'vehicle_id', 'vehicle_id');
    }
}
