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
    public $table = 'Food';
    public $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
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
        'created_at',
        'updated_at'
    ];
}
