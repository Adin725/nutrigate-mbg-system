<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MbgDistribution extends Model
{
    protected $fillable = ['school_id', 'mbg_menu_id', 'delivery_date', 'total_boxes_sent', 'delivery_status'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function menu()
    {
        return $this->belongsTo(MbgMenu::class, 'mbg_menu_id');
    }
}
