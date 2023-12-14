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
    protected $table = 'exercise';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'name',
        'description',
        'category',
        'equipment_needed',
        'difficulty_level',
        'demonstration_video_url',
        'exercise_variation',
        'target_heart_rate_range',
        'recommended_form_tips',
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
