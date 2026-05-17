<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MbgMenu extends Model
{
    protected $fillable = ['menu_package', 'calories', 'protein', 'status_gizi'];

    public function distributions()
    {
        return $this->hasMany(MbgDistribution::class);
    }
}
