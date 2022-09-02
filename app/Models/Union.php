<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    public function UpazilaName()
    {
        return $this->belongsto(Upazila::class, 'upazila_id');
    }

    public function AreaDetails(){
        return $this->hasMany(area::class,'union_id');
    }

    public function TaxholderInfo(){
        return $this->hasMany(TaxHolder::class,'union_id');
    }
}
