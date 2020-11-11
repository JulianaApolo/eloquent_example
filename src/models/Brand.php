<?php
namespace Models;

class Brand extends BaseModel
{
    protected $table = 'brands';

    protected $primaryKey = 'brand_id';

    protected $fillable = ['description'];

    public function model()
    {
        return $this->hasMany('Models\Model', 'brand_id', 'brand_id');
    }
}
