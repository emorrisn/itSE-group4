<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class MealFood extends Model
{
    protected $table = 'MealFood';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'id',
        'meal_id',
        'food_id',
        'quantity',
        'notes',
    ];

    // Relationships
    public function meal()
    {
        return $this->belongsTo(Meal::class, 'id', 'meal_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'id', 'food_id');
    }
}
