<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class Exercise extends Model
{
    public $table = 'exercise';
    public $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'name',
        'description',
        'category',
        'equipment_needed',
        'difficulty_level',
        'demonstration_video_url',
        'exercise_variation',
        'target_heart_rate_range',
        'recommended_form_tips',
        'created_at',
        'updated_at'
    ];
}
