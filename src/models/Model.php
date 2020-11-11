<?php
namespace Models;

class Model extends BaseModel
{
    protected $table = 'models';

    protected $primaryKey = 'model_id';

    protected $fillable = ['description'];

    public function brand()
    {
        return $this->hasOne('Models\Brand', 'brand_id', 'brand_id');
    }

    public function vehicle()
    {
        return $this->hasMany('Models\Vehicle', 'model_id', 'model_id');
    }
}
