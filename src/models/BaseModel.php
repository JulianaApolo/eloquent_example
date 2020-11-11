<?php
namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{

    use SoftDeletes;

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'modification_date';
    const DELETED_AT = 'removal_date';
}
