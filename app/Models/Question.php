<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Review\Entities\Review;

class Question extends Model
{
    use HasFactory;

    protected $with = ["options"];

    public function options(){
        return $this->hasMany(Option::class);
    }
}
