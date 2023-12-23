<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class ExerciseLog extends Model
{
    public $table = 'ExerciseLog';
    public $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'exercise_id',
        'workout_id',
        'user_id',
        'reps',
        'size',
        'duration',
        'notes',
        'perceived_difficulty_level',
        'fatigue_level',
        'motivation_level',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'id', 'exercise_id');
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'id', 'workout_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
