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
    protected $table = 'ExerciseLog';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
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
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'workout_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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