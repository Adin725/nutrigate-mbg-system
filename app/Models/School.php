<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['school_name', 'total_students', 'district'];

    public function distributions()
    {
        return $this->hasMany(MbgDistribution::class);
    }
}
