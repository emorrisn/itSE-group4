<?php

namespace App\Models;

use App\Helpers\DatabaseHelper;

/**
 * Provides basic template functions to amalgamate and associate data-model functions.  
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Models
 * @since      Class available since Release 1.0.3
 */
abstract class Model
{
    protected $connection;
    protected $table;
    protected $primaryKey;
    protected $timestamps = true;
    public $query;
    protected $fillable = [];
    protected $columns = [];
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->connection = new DatabaseHelper();
        $this->query = new QueryBuilder($this->connection);
        $this->fill($attributes);

        foreach ($this->columns as $value) {
            $this->$value = $value;
        }
    }

    public function __get($key)
    {
        return $this->attributes[$key];
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }

    // public function belongsTo($relatedModel, $foreignKey)
    // {
    //     $relatedTable = (new \ReflectionClass($relatedModel))->getShortName();

    //     $relatedModel = new $relatedModel();
    //     $relatedModel->where($foreignKey, '=', $this->{$this->primaryKey});

    //     return $relatedModel;
    // }

    public function belongsTo($relatedModel, $foreignKey = "id", $localKey)
    {
        $relatedModel = new $relatedModel();

        if (!$this->{$localKey}) {
            // No local value set
            return null;
        }

        $data = $relatedModel->query->from($relatedModel->table)->where($foreignKey, '=', $this->{$localKey})->get();

        if (!$data) {
            // Handle the case where no related model is found
            return null;
        }

        $relatedModel->fill($data);

        return $relatedModel;
    }

    public function hasMany($relatedModel, $foreignKey, $localKey = "id")
    {
        $relatedModel = new $relatedModel();
        $data = $relatedModel->query->from($relatedModel->table)->where($foreignKey, '=', $this->{$localKey})->get(false);
        $results = [];

        foreach ($data as $key => $value) {
            $model = new $relatedModel();
            $model->fill($value);
            $results[] = $model;
        }

        return $results;
    }

    public function create($data = [])
    {
        if ($this->timestamps) {
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
        }

        return $this->connection->create($this->table, $this->fillable, $data);
    }

    public function edit($id, $data = [])
    {
        $data['updated_at'] = date("Y-m-d H:i:s");

        return $this->connection->update($this->table, $id, $data);
    }

    public function delete($id)
    {
        return $this->connection->delete($this->table, $id);
    }

    // public function save($data)
    // {
    //     if ($this->attributes['id']) {
    //         // If the model has an ID, update the existing record
    //         return $this->query->where('id', '=', $this->attributes['id'])->update($data, $this->attributes['id']);
    //     } else {
    //         // If the model doesn't have an ID, create a new record
    //         $result = $this->query->create($data);

    //         // If the creation is successful, update the model with the new data
    //         if ($result) {
    //             foreach ($data as $key => $value) {
    //                 $this->$key = $value;
    //             }
    //         }

    //         return $result;
    //     }
    // }

    public function fill(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->attributes[$key] = $value;
            }
        }
    }
}

class QueryBuilder
{
    protected $table;
    protected DatabaseHelper $connection;
    public $conditions = [];
    protected $limit;
    protected $orderBy;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->conditions[] = [$column, $operator, $value, 'AND'];
        return $this;
    }

    public function orWhere($column, $operator, $value)
    {
        $this->conditions[] = [$column, $operator, $value, 'OR'];
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function orderBy($column, $direction = 'asc')
    {
        $this->orderBy = "ORDER BY $column $direction";
        return $this;
    }

    public function get($associate = true)
    {
        $queryString = 'SELECT * FROM ' . $this->table . ' ';

        foreach ($this->conditions as $key => $condition) {
            list($column, $operator, $value, $logicalOperator) = $condition;

            if ($key === 0) {
                $queryString .= "WHERE $column $operator ?";
            } else {
                $queryString .= " $logicalOperator $column $operator ?";
            }
        }

        if (!empty($this->orderBy)) {
            $queryString .= " $this->orderBy";
        }

        if (!empty($this->limit)) {
            $queryString .= " LIMIT $this->limit";
        }


        $results = $this->executeQuery($queryString, $associate, $this->getBindParams());

        return $results;
    }


    private function getBindParams()
    {
        $params = [];

        foreach ($this->conditions as $condition) {
            list(,, $value) = $condition;
            $params[] = $value;
        }

        return $params;
    }

    private function executeQuery($queryString, $associate, $params = [])
    {
        return $this->connection->query($queryString, $associate, $params);
    }
}

// Example: 
// // Create a new user
// $user = new User();
// $user->create([
//     'name' => 'John Doe',
//     'email' => 'john@example.com',
//     'password' => 'hashed_password',
// ]);

// // Fetch all users
// $users = $user->get();
// var_dump($users);

// // Display user information
// foreach ($users as $user) {
//     echo "User ID: {$user['id']}, Name: {$user['name']}, Email: {$user['email']}\n";
// }

// // Find a user by ID
// $foundUser = $user->where('id', '=', 1)->get();
// var_dump($foundUser);


// // Update a user
// $user->edit(1, ['name' => 'Updated Name']);

// // Delete a user
// $user->delete(1);
