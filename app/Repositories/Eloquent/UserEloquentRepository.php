<?php

namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\User;

class UserEloquentRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    /* ===== INIT MODEL ===== */
    protected function setModel()
    {
        $this->model = User::class;
    }

    /* ===== PUBLIC FUNCTION ===== */
    public function findOneActiveSkeleton($id)
    {
        return $this->getModel()
            ->where('users.active', true)
            ->select('users.*')
            ->first();
    }

}