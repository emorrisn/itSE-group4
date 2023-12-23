<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class Workout extends Model
{

    public $table = 'workout';
    public $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'name',
        'description',
        'duration',
        'intensity_level',
        'targeted_muscle_groups',
        'location',
        'recommended_intensity_range',
        'required_equipment',
        'created_at',
        'updated_at'
    ];

    public function excercises()
    {
        $excercises = [];

        foreach ($this->hasMany(WorkoutExercise::class, 'workout_id', 'id') as $uw) {
            $excercises[] = $uw->exercise();
        }

        return $excercises;
    }

    public function userWorkouts()
    {
        return $this->hasMany(UserWorkout::class, 'workout_id', 'id');
    }
}
