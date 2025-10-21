<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employee';

    protected $fillable = [
        'name',
        'ic_no',
        'email',
        'phone_no',
        'dept_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'department_id'); //first parameter = FK, second parameter = PK
    }

    
    
}
