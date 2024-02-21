<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::filterBySubdomain(User::all());

        if($users->isNotEmpty()){

            return $this->sendResponse($users, 'Users retrieved successfully', 200);
        }

        return $this->sendError([], 'No record found', 404);
    }


    public function dashboard(){
        $users = User::all();

        if($users->isNotEmpty()){

            return $this->sendResponse($users, 'Users retrieved successfully', 200);
        }
        
        return $this->sendError([], 'No record found', 404);
    }

    public function store(UserRequest $request){

        $input = $request->all();

       if(User::create($input)){

           return $this->sendResponse($input, 'User created successfully', 200);
       }

      // return response()->json(['error' => 'Failed to create user'], 500);
       return $this->sendError([], 'Failed to create user', 500);

    }
}
