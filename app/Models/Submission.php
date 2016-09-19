<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    public function getFullnameAttribute()
    {
        return $this->first . " " . $this->last;
    }

    public $appends = [ 'fullname'];
}
