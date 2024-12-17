<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'time_in',
        'time_out',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
    public function dependentEntities()
    {
        return $this->hasMany(DependentEntity::class);
    }
}
