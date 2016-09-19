<?php

namespace App\Http\Controllers\ControllerTraits;

use App\Models\Submission;

trait SubmissionsTrait {
    public function getAllSubmissions()
    {
        $all = Submission::paginate();
        return $all;
    }

    public function getSubmission($id)
    {
        $object = Submission::find($id);
        return $object;
    }
}