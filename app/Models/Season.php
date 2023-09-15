<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['number','series_id'];

    public function series ()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes ()
    {
        return $this->hasMany(Episode::class);
    }
}
