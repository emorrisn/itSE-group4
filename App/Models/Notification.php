<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class Notification extends Model
{
    protected $table = 'Notification';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Fillable fields
    protected $fillable = [
        'user_id',
        'type',
        'content',
        'delivery_status',
        'timestamp',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
