<?php

namespace App\Helpers;

/**
 * Provides a basic and low-level inteface for validation. 
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Helpers
 * @since      Class available since Release 1.0.1
 */

class ValidationHelper
{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate(array $rules)
    {
        foreach ($rules as $rule) {
            $field = $rule['field'];
            $methods = $rule['methods'];
            $message = isset($rule['message']) ? $rule['message'] : null;

            foreach ($methods as $method) {
                if (strpos($method, 'confirm:') !== false) {
                    // Handle confirm validation separately
                    $confirmField = substr($method, strlen('confirm:'));
                    $this->confirm($field, $confirmField, $message);
                } else {
                    $this->$method($field, $message);
                }
            }
        }

        return $this;
    }

    public function required($field, $message = 'Field is required.')
    {
        if (empty($this->data[$field])) {
            $this->errors[] = $message;
        }

        return $this;
    }

    public function email($field, $message = 'Invalid email address.')
    {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = $message;
        }

        return $this;
    }

    public function integer($field, $message = 'Must be an integer.')
    {
        if (!ctype_digit(strval($this->data[$field]))) {
            $this->errors[] = $message;
        }

        return $this;
    }

    public function string($field, $message = 'Must be a string.')
    {
        if (!is_string($this->data[$field])) {
            $this->errors[] = $message;
        }

        return $this;
    }

    public function confirm($field, $confirmationField, $message = 'Confirmation does not match.')
    {
        if ($this->data[$field] !== $this->data[$confirmationField]) {
            $this->errors[] = $message;
        }

        return $this;
    }

    // Add more validation methods as needed

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid()
    {
        return empty($this->errors);
    }
}
