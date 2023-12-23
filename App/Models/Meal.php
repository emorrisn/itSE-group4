<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class Meal extends Model
{
    public $table = 'Meal';
    public $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'type',
        'name',
        'description',
        'caloric_content',
        'allergen_information',
        'preparation_time',
        'cooking_instructions',
        'recipe_link',
        'vegetarian_indicator',
        'created_at',
        'updated_at'
    ];
}
