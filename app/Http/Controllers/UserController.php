<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\UserRepository;

class UserController extends Controller
{
    protected $userRepository;
    //On créé une instance de notre repository.
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository =  $userRepository; 
    }


    public function index(){
        $users = $this->userRepository->getAllUsers();
        return view('users.index' , compact('users'));
    }
}
