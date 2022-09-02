<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxHolder extends Model
{
    use HasFactory;

    public function UnionName()
    {
        return $this->belongsto(Union::class, 'union_id');
    }

    public function AreaName()
    {
        return $this->belongsto(area::class, 'area_id');
    }
    
}
