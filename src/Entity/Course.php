<?php

namespace App\Entity;

use App\Entity\Traits\DescriptionTrait;
use App\Entity\Traits\NameTrait;
use App\Entity\Traits\TypeTrait;
use App\Entity\Traits\UuidTrait;
use Ramsey\Uuid\Uuid;

class Course
{
    use UuidTrait;
    use NameTrait;
    use DescriptionTrait;
    use TypeTrait;

    public function __construct(string $name, string $description, string $type)
    {
        CourseTypes::validateType($type);

        $this->id = Uuid::uuid1();
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
    }

}
