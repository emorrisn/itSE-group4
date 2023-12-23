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
    public $table = 'userworkout';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'user_id',
        'workout_id',
        'start_date',
        'completion_date',
        'days',
        'feedback_rating',
        'user_comments',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class, 'id', 'workout_id');
    }

    public function isComplete($date)
    {
        $history = new ExerciseLog();
        $historys = [];

        $attributes = $history->query->from($history->table)
            ->where('workout_id', '<=', $this->workout()->id)
            ->where('user_id', '<=', $this->user()->id)
            ->where('created_at', '=', $date)
            ->get(false);


        foreach ($attributes as $attribute) {
            $new = new ExerciseLog();
            $new->fill($attribute);
            $historys[] = $new;
        }

        if (count($historys) > 0) {
            return true;
        }

        return false;
    }
}
