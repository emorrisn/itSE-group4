<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class UserDiet extends Model
{
    public $table = 'UserDiet';
    public $timestamps = true;

    // Fillable fields
    public $fillable = [
        'id',
        'user_id',
        'diet_id',
        'user_trainer_id',
        'status',
        'completion_date',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function diet()
    {
        return $this->belongsTo(Diet::class, 'id', 'diet_id');
    }

    public function user_trainer()
    {
        return $this->belongsTo(User::class, 'id', 'user_trainer_id');
    }
}
