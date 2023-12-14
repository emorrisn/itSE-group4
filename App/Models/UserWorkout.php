<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class UserWorkout extends Model
{
    protected $table = 'userworkout';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'workout_id',
        'status',
        'completion_date',
        'feedback_rating',
        'user_comments',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}
