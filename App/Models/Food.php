<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */ 
class Food extends Model
{
    protected $table = 'Food';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'name',
        'description',
        'calories_per_serving',
        'proteins',
        'fats',
        'carbohydrates',
        'nutritional_information',
        'origin',
        'shelf_life',
        'source',
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
}