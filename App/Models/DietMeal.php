<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class DietMeal extends Model
{
    protected $table = 'DietMeal';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'id',
        'diet_id',
        'meal_id',
        'order',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function diet()
    {
        return $this->belongsTo(Diet::class, 'id', 'diet_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class, 'id', 'meal_id');
    }
}
