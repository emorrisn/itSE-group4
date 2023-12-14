<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class Diet extends Model
{
    protected $table = 'Diet';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'user_trainer_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'caloric_goal',
        'dietician_comments',
        'allowed_cheat_days',
        'dietary_restrictions',
    ];

    // Relationships
    public function user_trainer()
    {
        return $this->belongsTo(User::class, 'user_trainer_id');
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
