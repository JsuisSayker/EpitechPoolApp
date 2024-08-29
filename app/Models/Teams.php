<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $table = 'teams';
    protected $fillable = ['name'];

    public function points()
    {
        return $this->hasMany(Points::class);
    }
}
