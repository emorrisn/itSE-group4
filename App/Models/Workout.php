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

    protected $table = 'workout';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'name',
        'description',
        'duration',
        'intensity_level',
        'targeted_muscle_groups',
        'location',
        'recommended_frequency',
        'recommended_intensity_range',
        'required_equipment',
    ];
}
