<?php

namespace App\Http\Controllers\ControllerTraits;

use App\Models\User;

trait UsersTrait {
    public function getAllUsers()
    {
        $all = User::paginate();
        return $all;
    }

    public function getUser($id)
    {
        $object = User::find($id);
        return $object;
    }
}