<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;
    public function UnionName()
    {
        return $this->belongsto(Union::class, 'union_id');
    }

    
    public function TaxholderInfo(){
        return $this->hasMany(TaxHolder::class,'area_id');
    }
}
