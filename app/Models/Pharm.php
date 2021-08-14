<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharm extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'address',
        'phone',
        'city',
        'start_work_time',
        'finish_work_time',

    ];

    public  function drug()
    {
        return $this->belongsToMany(\App\Models\Drug::class, 'pharm_drug_models', 'drug_id', 'id');
    }
}
