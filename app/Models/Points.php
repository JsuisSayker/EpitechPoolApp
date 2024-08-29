<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    use HasFactory;

    protected $table = 'points';
    protected $fillable = ['teams', 'point', 'description'];

    public function teams()
    {
        return $this->belongsTo(Teams::class);
    }
}
