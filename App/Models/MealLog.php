<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
class MealLog extends Model
{
    protected $table = 'MealLog';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'diet_id',
        'meal_id',
        'time_of_consumption',
        'satisfaction_level',
        'location_of_consumption',
        'mood_during_consumption',
        'additional_comments',
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'meal_id');
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