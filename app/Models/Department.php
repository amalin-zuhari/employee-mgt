<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    protected $primaryKey = 'department_id'; // important
    public $incrementing = false; // false for string primary key
    protected $keyType = 'string'; // string for string primary key

    protected $fillable = ['department_id', 'name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'dept_id', 'department_id');
    }

}
