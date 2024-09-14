<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $fillable = ['description'];

    public function notifications()
    {
        return $this->belongsTo(Notifications::class);
    }
}
