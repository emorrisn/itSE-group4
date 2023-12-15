<?php

namespace App\Models;

/**
 * Provides a template and an interface for user data models.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.2
 */
class User extends Model
{

    public $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $attributes = [];

    protected $fillable = [
        'id',
        'type',
        'pin',
        'name',
        'email',
        'password',
        'gender',
        'age',
        'height',
        'weight',
        'description',
        'trainer_id',
        'profile_picture_url',
        'emergency_contact_info',
        'medical_history',
        'preferred_language',
        'address',
        'created_at',
        'updated_at'
    ];

    // Relationships


    public function trainer()
    {
        return $this->belongsTo($this, 'id', 'trainer_id');
    }

    public function findByEmail($email)
    {
        return $this->query->from($this->table)->where('email', '=', $email)->get();
    }

    // Add a method to verify user credentials
    public function verifyCredentials($email, $password)
    {
        $user = $this->findByEmail($email);

        // var_dump(password_verify($password, $user['password']));
        // die();

        if ($user && password_verify($password, $user['password'])) {
            $this->fill($user);

            return $this;
        }


        return null;
    }
}
