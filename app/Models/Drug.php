<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'name',
        'state',
        'date',
        'license',
        'pharm_id',
        'producer_id',
        'material_id',
        'marker',
    ];

    

    public function pharm()
    {
        return $this->belongsToMany(\App\Models\Pharm::class, 'pharm_drug_models', 'drug_id', 'pharm_id');
    }
}
