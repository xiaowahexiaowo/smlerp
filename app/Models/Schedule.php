<?php

namespace App\Models;

class Schedule extends Model
{
    protected $fillable = ['start_date', 'delivery_date', 'plan_no', 'category', 'appendix'];
}
