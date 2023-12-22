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
    public $table = 'Diet';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Fillable fields
    protected $fillable = [
        'id',
        'user_trainer_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'caloric_goal',
        'dietician_comments',
        'allowed_cheat_days',
        'dietary_restrictions',
        'created_at',
        'updated_at'
    ];

    // Relationships
    public function user_trainer()
    {
        return $this->belongsTo(User::class, 'id', 'user_trainer_id');
    }

    public function userDiet()
    {
        return $this->hasMany(DietMeal::class, 'diet_id', 'id');
    }

    public function meals()
    {
        $meals = [];

        foreach ($this->hasMany(DietMeal::class, 'diet_id', 'id', 'order') as $dm) {
            $meals[] = $dm->meal();
        }

        return $meals;
    }
}
