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
        'diet_id',
        'meal_id',
        'order',
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function diet()
    {
        return $this->belongsTo(Diet::class, 'diet_id');
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