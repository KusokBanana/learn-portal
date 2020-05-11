<?php

namespace App\Entity\Traits;

use App\Entity\Course;

trait CourseTrait
{
    private Course $course;

    public function getCourse(): Course
    {
        return $this->course;
    }
}
