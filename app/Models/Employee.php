<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'department_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'birthdate',
        'date_hired',
    ];

    public function department()
    {

        return $this->belongsTo(Department::class);
    }
    public function country()
    {

        return $this->belongsTo(Country::class);
    }
    public function state()
    {

        return $this->belongsTo(state::class);
    }
    public function city()
    {

        return $this->belongsTo(City::class);
    }
}
