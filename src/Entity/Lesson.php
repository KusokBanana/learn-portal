<?php

namespace App\Entity;

use App\Entity\Traits\CourseTrait;
use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\DescriptionTrait;
use App\Entity\Traits\NameTrait;
use App\Entity\Traits\UuidTrait;
use Ramsey\Uuid\Uuid;

class Lesson
{
    use UuidTrait;
    use CreatedAtTrait;
    use NameTrait;
    use DescriptionTrait;
    use CourseTrait;

    public function __construct(string $name, string $description, Course $course)
    {
        $this->id = Uuid::uuid1();
        $this->createdAt = new \DateTime();

        $this->name = $name;
        $this->description = $description;
        $this->course = $course;
    }
}
