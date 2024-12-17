<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependentEntity extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name

    // Specify fillable fields for mass assignment
    protected $fillable = ['username', 'email', 'attendance_id'];

    /**
     * Relationship with Attendance
     * A dependent entity belongs to an attendance.
     */
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}