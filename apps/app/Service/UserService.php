<?php

namespace App\Service;

use App\Dto\CreateUserDTO;
use App\Interface\UserRepositoryInterface;

class UserService
{
    /**
     * Create a new class instance.
     */
    public $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getDataUsers() {
        try {
            $users = $this->repository->getUsers();
            return $users;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createUser(CreateUserDTO $request)
    {
        try {
            $user = $this->repository->createUser($request);
            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
