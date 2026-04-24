<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function index() {
        $users = $this->userService->getDataUsers();
        dd($users);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        // dd($request->all());
        $user = $this->userService->createUser($request->toDTO());
        dd($user);
        return redirect()->route('users.index');
    }

}
