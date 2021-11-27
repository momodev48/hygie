<?php 

namespace App\Repository;
use App\Models\User;
class UserRepository 
{
protected $model;
// Instanciation du model
public function __construct(User $user)
{
    $this->model = $user;
}
// Récupération des utilisateurs sous forme de Collection
// (tableau)
    public function getAllUsers()
    {
        return $this->model->all();
    }

    public function getAdmin() {
        return $this->model->where('id',1)->firstOrFail();
    }
} 



?>