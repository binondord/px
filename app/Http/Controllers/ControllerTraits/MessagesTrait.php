<?php

namespace App\Http\Controllers\ControllerTraits;

use App\Models\Message;

trait MessagesTrait {
    public function getAllMessages()
    {
        $all = Message::paginate();
        return $all;
    }

    public function getMessage($id)
    {
        $object = Message::find($id);
        return $object;
    }
}