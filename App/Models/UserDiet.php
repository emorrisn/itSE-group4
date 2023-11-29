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
    protected $table = 'UserDiet';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'diet_id',
        'user_trainer_id',
        'status',
        'completion_date',
        'created_by_id',
        'updated_by_id',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function diet()
    {
        return $this->belongsTo(Diet::class, 'diet_id');
    }

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