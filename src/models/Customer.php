<?php
namespace Models;

class Customer extends BaseModel
{
    protected $table = 'customers';

    protected $primaryKey = 'customer_id';

    protected $fillable = ['name'];
    
    public function rent()
    {
        return $this->hasMany('Models\Rent', 'customer_id', 'customer_id');
    }
}
