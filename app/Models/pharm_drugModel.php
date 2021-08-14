<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharm_drugModel extends Model
{
    use HasFactory;
    public $fillable = [
        'pharm_id',
        'drug_id'
    ];

    public function drug()
    {
        return $this->belongsToMany(\App\Models\Drug::class, 'pharm_drug_models', 'id', 'drug_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function pharm()
    {
        return $this->belongsToMany(\App\Models\Pharm::class, 'pharm_drug_models', 'id', 'pharm_id');
    }

}
