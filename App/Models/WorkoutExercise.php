<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class WorkoutExercise extends Model
{

    protected $table = 'workoutexercise';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'workout_id',
        'exercise_id',
        'sets',
        'reps',
        'rest_time_between_sets',
    ];

    // Relationships
    public function workout()
    {
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
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
