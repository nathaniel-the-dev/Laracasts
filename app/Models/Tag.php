<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany(Tag::class, relatedPivotKey: 'job_listing_id');
    }
}
