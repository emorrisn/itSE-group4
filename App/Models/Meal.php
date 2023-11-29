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
    protected $table = 'Meal';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'type',
        'name',
        'description',
        'caloric_content',
        'allergen_information',
        'preparation_time',
        'cooking_instructions',
        'recipe_link',
        'vegetarian_indicator',
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